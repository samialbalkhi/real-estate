<?php

namespace App\Http\Requests\Backend;

use App\helpers\ApiResponse;
use App\Rules\Phone;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user())],
            'phone' => ['required', new Phone, Rule::unique('users')->ignore(auth()->user())],
            'image' => ['nullable', 'image'],
            'old_password' => ['sometimes', 'required', 'min:8'],
            'new_password' => ['sometimes', 'required', 'min:8', 'different:old_password'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);

    }
}
