<?php

namespace App\Http\Requests\Cars;

use App\Enums\Cars\Status;
use App\Models\Car;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'status' => ['required', 'integer', Rule::in(Status::cases())]
        ]);
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'status' => 'Статус'
        ]);
    }

    protected function vinUniqueRule()
    {
        return Rule::unique(Car::class, 'vin')->ignore($this->car->id);
    }
}
