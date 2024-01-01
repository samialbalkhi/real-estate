<?php

namespace App\Http\Requests\Backend;

use App\helpers\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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

        return [
            'name' => ['required', 'min:3', 'max:30', 'alpha'],
            'image' => ['required', 'image'],
            'description' => ['required', 'min:10', 'max:4294967295'],
            'price' => ['required', 'numeric'],
            'product_discount' => ['nullable'],
            'location' => ['required'],
            'status' => ['nullable', 'boolean'],
            'offer_id' => ['required'],

        ];

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);

    }
}
