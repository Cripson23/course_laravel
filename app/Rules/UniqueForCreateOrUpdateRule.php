<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Translation\PotentiallyTranslatedString;

class UniqueForCreateOrUpdateRule implements ValidationRule
{
    protected string $table;
    protected $input;
    protected array $additionalFields;
    protected $idToIgnore;

    public function __construct($table, $input, $additionalFields, $idToIgnore)
    {
        $this->table = $table;
        $this->input = $input;
        $this->additionalFields = $additionalFields;
        $this->idToIgnore = $idToIgnore;
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table($this->table)->where($attribute, $value);
        foreach ($this->additionalFields as $field) {
            if (isset($this->input[$field])) {
                $query->where($field, $this->input[$field]);
            }
        }
        if ($this->idToIgnore) {
            $query->where('id', '!=', $this->idToIgnore);
        }
        if ($query->count() !== 0) {
            $fail(trans('validation.unique'));
        }
    }
}
