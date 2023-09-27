<?php

namespace App\Http\Requests\Brands;

use App\Models\Brand;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    public function titleUniqueRule()
    {
        return Rule::unique(Brand::class, 'title')->ignore($this->brand->id);
    }
}
