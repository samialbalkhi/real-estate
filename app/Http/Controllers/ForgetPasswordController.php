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
        $this->forgetPasswordService->forgotPassword($request);
        return response()->json(['message' => 'send email code successfully']);
    }
}
