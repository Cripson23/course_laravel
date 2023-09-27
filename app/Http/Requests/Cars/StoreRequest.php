<?php

namespace App\Http\Requests\Cars;

use App\Models\Car;
use App\Rules\UniqueForCreateOrUpdateRule;
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
        $bodyValues = array_keys(config('app-cars.bodyTypes'));
        $idToIgnore = $this->car->id ?? null;
        $rules = [
            /*
             Проверка уникальности поля, с исключением текущей записи при обновлении + с учётом совпадения дополнительного поля
             'model' => ['required', 'min:2', 'max:128', Rule::unique('cars')->where(function ($query) use ($recordId) {
                if ($recordId) {
                    $query->where('id', '!=', $recordId);
                }
                return $query->where('brand', $this->input('brand'));
            })],*/
            /* Проверка с помощью кастомного валидатора
            'model' => ['required', 'min:2', 'max:128',
                new UniqueForCreateOrUpdateRule('cars', $this->input(), ['brand', 'body_type'], $idToIgnore)
            ],*/
            'brand_id' => 'required|exists:brands,id',
            'model' => ['required', 'min:2', 'max:128',
                new UniqueForCreateOrUpdateRule('cars', $this->input(), ['brand'], $idToIgnore)
            ],
            'price' => ['required', 'integer', 'max:999999999'],
            'body_type' => ['required', 'integer', Rule::in($bodyValues)],
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id',
            'vin' => ['required', 'min:4', 'max:12', $this->vinUniqueRule()],
        ];
        // Проверка уникальности одного поля, с исключением текущей записи при обновлении
        /*if ($this->isMethod('POST')) {
            $rules['model'][] = 'unique:cars,model';
        } else if ($this->isMethod('PUT')) {
            $rules['model'][] = "unique:cars,model,{$this->route('car')}";
        }*/
        return $rules;
    }

    public function attributes()
    {
        return [
            'brand_id' => 'Бренд',
            'model' => 'Модель',
            'price' => 'Стоимость',
            'body_type' => 'Тип кузова',
            'tags' => 'Тэги',
            'tags.*' => 'Тэги',
            'vin' => 'Vin',
        ];
    }

    protected function vinUniqueRule()
    {
        return Rule::unique(Car::class, 'vin')->whereNull('deleted_at');
    }
}
