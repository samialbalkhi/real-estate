<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->phone($attribute, $value)) {
            $fail(trans('The :attribute must be a valid phone number.'));
        }
    }

    public function phone($attribute, $value)
    {
        return (bool) preg_match('/^([0-9\s\-\+\(\)]{10,})$/', $value);
    }
}
