<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Validation\ValidationException;
use App\Service\ForgetPassowrd\ForgetPasswordService;
use Illuminate\Validation\Rules\Password as RulesPassword;

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
