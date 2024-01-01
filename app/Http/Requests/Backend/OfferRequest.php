<?php

namespace App\Http\Requests\Backend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\helpers\ApiResponse;

class OfferRequest extends FormRequest
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
            'name' => ['required', 'unique:offers,name', 'max:30', 'min:3', 'alpha'],
            'image' => ['required', 'image', 'max:2000'],
            'status' => ['nullable', 'boolean'],

        ];

        if (Request::route()->getName() == 'offer.update') {
            $rules['name'] = [
                'required', 'max:30', 'min:3', 'alpha',
                Rule::unique('offers', 'name')->ignore($this->offer->id),
            ];
        }

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);

    }
}
