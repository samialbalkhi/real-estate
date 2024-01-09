<?php

namespace App\Http\Requests\backend;

use App\helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdvertisementRequest extends FormRequest
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
            'description' => ['required', 'min:3'],
            'width_street' => ['required', 'numeric'],
            'number_of_room' => ['required', 'numeric'],
            'number_of_hall' => ['required', 'numeric'],
            'number_of_bathroom' => ['required', 'numeric'],
            'floor_number' => ['required', 'numeric'],
            'age_of_real_estate' => ['required'],
            'number_of_people' => ['required', 'numeric'],
            'rental_period' => ['required'],
            'lat' => ['required'],
            'lng' => ['required'],
            'price' => ['required', 'numeric'],
            'space' => ['required', 'numeric'],
            'real_estate_type_id' => ['required'],
            'real_estate_category_id' => ['required'],
            'listOfImage' => ['array', 'required'],
            'listOfImage.*.image' => ['required', 'image'],
        ];

        if (Request::route()->getName() == 'userAdvertisements.update') {
            unset($rules['listOfImage']);
        }

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);
    }
}
