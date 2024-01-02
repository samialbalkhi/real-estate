<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Service\ForgetPassowrd\ResetPasswordService;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request, ResetPasswordService $resetPasswordService)
    {
        return response()->json($resetPasswordService->resetPassword($request));
    }
}
