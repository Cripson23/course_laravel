<?php

namespace App\Http\Requests\Tags;

use App\Models\Tag;
use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
    protected function nameUniqueRule()
    {
        return Rule::unique(Tag::class, 'name')->ignore($this->tag->id);
    }

    protected function urlUniqueRule()
    {
        return Rule::unique(Tag::class, 'url')->ignore($this->tag->id);
    }
}
