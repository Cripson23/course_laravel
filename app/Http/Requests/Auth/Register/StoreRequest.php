<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:64',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::defaults()]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль'
        ];
    }
}
