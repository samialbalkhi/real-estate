<?php

namespace App\Http\Requests\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SectionRequest extends FormRequest
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
            'name' => ['required', 'unique:sections,name', 'max:30', 'min:3','alpha'],
            'status' => ['nullable'],
        ];
            
        if (Request::route()->getName() == 'sections.update') {
            $rules['name'] = ['required', 'max:30', 'min:3','alpha',
            Rule::unique('sections', 'name')->ignore($this->section->id)];
        }

        return $rules;
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
