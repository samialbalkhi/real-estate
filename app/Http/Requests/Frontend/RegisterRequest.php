<?php

namespace App\Http\Requests\Frontend;

use App\helpers\ApiResponse;
use App\Rules\Phone;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', new Phone, 'unique:users,phone'],
            'image' => ['nullable', 'image'],
            'password' => ['sometimes', 'required', 'min:3', 'max:30', 'confirmed'],
            'password_confirmation' => ['sometimes', 'required', 'min:8'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);

    }
}
