<?php

namespace App\Http\Controllers\ForgetPassword;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Service\ForgetPassowrd\ResetPasswordService;

class ResetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ResetPasswordRequest $request, ResetPasswordService $resetPasswordService)
    {
        return response()->json($resetPasswordService->resetPassword($request));
    }
}
