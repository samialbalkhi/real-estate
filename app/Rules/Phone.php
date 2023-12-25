<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->phone($attribute, $value)) {
            $errorMessage = trans('Please enter a valid phone number');

            throw new HttpResponseException(
                new JsonResponse([
                    'success' => false,
                    'message' => 'Validation errors',
                    'data' => [$attribute => [$errorMessage]],
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }
    }

    public function phone($attribute, $value)
    {
        return (bool) preg_match('/^([0-9\s\-\+\(\)]{10,})$/', $value);
    }
}
