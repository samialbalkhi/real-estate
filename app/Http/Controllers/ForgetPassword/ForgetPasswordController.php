<?php

namespace App\Http\Controllers\ForgetPassword;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Service\ForgetPassowrd\ForgetPasswordService;

class ForgetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ForgetPasswordRequest $request,ForgetPasswordService $forgetPasswordService)
    {
        $forgetPasswordService->forgotPassword($request);

        return response()->json(['message' => 'send email code successfully']);
    }
}
