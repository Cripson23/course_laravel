<?php

namespace App\Http\Requests\Countries;

use App\Models\Country;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    protected function nameUniqueRule()
    {
        return Rule::unique(Country::class, 'name')->ignore($this->country->id);
    }

    protected function isoUniqueRule()
    {
        return Rule::unique(Country::class, 'iso')->ignore($this->country->id);
    }
}
