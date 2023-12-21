<?php

namespace App\Http\Requests\Backend;

<<<<<<< HEAD
use App\Rules\Phone;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
=======
>>>>>>> 9b5495c90298a33c454398db13b0f252829198a3
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
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
            'phone' => ['required',new Phone(), Rule::unique('users')->ignore(auth()->user())],
            'image' => ['nullable', 'image'],
            'old_password' => ['sometimes', 'required', 'min:8'],
            'new_password' => ['sometimes', 'required', 'min:8', 'different:old_password'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ]),
        );
    }
}
