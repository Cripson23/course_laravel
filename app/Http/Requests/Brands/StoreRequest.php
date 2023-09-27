<?php

namespace App\Http\Requests\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:2', 'max:64', $this->titleUniqueRule()],
            'country_id' => ['required', 'exists:countries,id'],
            'description' => 'required|min:10|max:512',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
            'country_id' => 'Страна',
            'description' => 'Описание'
        ];
    }

    public function titleUniqueRule()
    {
        return Rule::unique(Brand::class, 'title');
    }
}
