<?php

namespace App\Http\Requests\Countries;

use App\Models\Country;
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
            'name' => ['required', 'min:3', 'max:128', $this->nameUniqueRule()],
            'iso' => ['required', 'size:3', $this->isoUniqueRule()]
        ];
        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'Название',
            'iso' => 'ISO',
        ];
    }

    protected function nameUniqueRule()
    {
        return Rule::unique(Country::class, 'name');
    }

    protected function isoUniqueRule()
    {
        return Rule::unique(Country::class, 'iso');
    }
}
