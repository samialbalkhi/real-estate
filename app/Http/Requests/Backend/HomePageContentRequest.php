<?php

namespace App\Http\Requests\Backend;

use App\helpers\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomePageContentRequest extends FormRequest
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
            'description' => ['required'],
            'image' => ['required', 'image', 'max:2000'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);

    }
}
