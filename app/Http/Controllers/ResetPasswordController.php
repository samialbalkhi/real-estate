<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\ResetPasswordRequest;
use App\Service\ForgetPassowrd\ResetPasswordService;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request, ResetPasswordService $resetPasswordService)
    {
        return response()->json($resetPasswordService->resetPassword($request));
    }
}
