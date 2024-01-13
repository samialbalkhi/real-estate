<?php

namespace App\Http\Requests\Frontend;

use App\helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AdvertisingPictureRequest extends FormRequest
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
            'image' => ['required', 'image'],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);
    }
}
