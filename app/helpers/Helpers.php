<?php
namespace App\helpers;

class Helpers {
    public static function updateSuccessResponse($message = 'updated successfully') {
        return response()->json(['message' => $message]);
    }

    public static function deleteSuccessResponse($message = 'deleted successfully') {
        return response()->json(['message' => $message]);
    }
}