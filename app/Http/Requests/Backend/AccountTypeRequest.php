<?php

namespace App\Http\Requests\Backend;

use App\helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountTypeRequest extends FormRequest
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
            'name' => ['required', 'unique:account_types,name', 'max:30', 'min:3', 'alpha'],
            'image' => ['required', 'image', 'max:2000'],
            'status' => ['nullable', 'boolean'],

        ];

        if (Request::route()->getName() == 'accountTypes.update') {
            $rules['name'] = [
                'required', 'max:30', 'min:3', 'alpha',
                Rule::unique('account_types', 'name')->ignore($this->accountType->id),
            ];
        }

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);

    }
}
