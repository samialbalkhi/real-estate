<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Service\ForgetPassowrd\ForgetPasswordService;

class ForgetPasswordController extends Controller
{
    public function __construct(private ForgetPasswordService $forgetPasswordService)
    {
    }

    public function forgotPassword(ForgetPasswordRequest $request)
    {
        return response()->json($this->forgetPasswordService->forgotPassword($request));
    }

    public function showResetForm(string $token)
    {
        return response()->json($this->forgetPasswordService->showResetForm($token));
    }
}
