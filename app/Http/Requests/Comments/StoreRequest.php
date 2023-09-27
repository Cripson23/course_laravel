<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'author_name' => 'required|string|min:2|max:64',
            'text' => 'required|string|min:1|max:1024',
        ];
    }

    public function attributes()
    {
        return [
            'author_name' => 'Ваше имя',
            'text' => 'Текст комментария'
        ];
    }

    public function checkCommentable()
    {
        $commentables = config('commentables');
        if (!isset($commentables[$this->commentable_type])) {
            throw ValidationException::withMessages([
                'commentable_type' => 'Произошла ошибка при отправке комментария'
            ]);
        }

        return $commentables[$this->commentable_type]::findOrFail($this->commentable_id);
    }
}
