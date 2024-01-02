<?php

namespace App\helpers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiResponse
{
    public static function updateSuccessResponse($message = 'updated successfully')
    {
        return response()->json(['message' => $message]);
    }

    public static function deleteSuccessResponse($message = 'deleted successfully')
    {
        return response()->json(['message' => $message]);
    }

    public static function createSuccessResponse($message = 'create successfully')
    {
        return response()->json(['message' => $message], Response::HTTP_CREATED);
    }

    public static function logoutSuccessResponse($message = 'logout successfully')
    {
        return response()->json(['message' => $message], 200);
    }

    public static function resetPsswordSuccessResponse($message = 'Password reset successfully')
    {
        return response()->json(['message' => $message], 200);
    }

    public static function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'success' => false,
                    'message' => 'Validation errors',
                    'data' => $validator->errors(),
                ],
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
            ),
        );
    }
}
