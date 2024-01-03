<?php

namespace App\Http\Requests\Frontend;

use App\helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class FinanceCalculatorRequeset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'property_value' => ['required', 'numeric', 'min:1'],
            'loan_term_id' => ['required'],
            'down_payment_percentage' => ['required', 'numeric', 'min:0'],
            'employment_status' => ['required', 'alpha', 'min:3', 'max:30'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);
    }
}
