<?php

namespace App\Http\Requests\Tags;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'min:3', 'max:64', $this->nameUniqueRule()],
            'url' => ['required', 'min:3', 'max:32', $this->urlUniqueRule()],
        ];
        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'Название',
            'url' => 'Ссылка',
        ];
    }

    protected function nameUniqueRule()
    {
        return Rule::unique(Tag::class, 'name');
    }

    protected function urlUniqueRule()
    {
        return Rule::unique(Tag::class, 'url');
    }
}
