<?php

namespace App\helpers;

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
}
