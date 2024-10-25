<?php

namespace App\Http\Requests\Auth\Sessions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['boolean']
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль'
        ];
    }

    public function tryAuthUser(){
        if (!Auth::attempt($this->only(['email', 'password']), $this->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }
}
