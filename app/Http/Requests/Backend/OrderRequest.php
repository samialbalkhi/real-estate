<?php

namespace App\Http\Requests\Backend;

use App\helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $rules = [];

        $rules = [
            'lat' => ['required'],
            'lng' => ['required'],
            'highest_price' => ['required', 'numeric'],
            'lowest_price' => ['required', 'numeric'],
            'highest_space' => ['required', 'numeric'],
            'lowest_space' => ['required', 'numeric'],
            'real_estate_type_id' => ['required'],
            'real_estate_category_id' => ['required'],
        ];

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);
    }
}
