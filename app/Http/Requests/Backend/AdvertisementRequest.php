<?php

namespace App\Http\Requests\backend;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        return [
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
            'status' => ['required', 'boolean'],
            'featured' => ['required', 'boolean'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
