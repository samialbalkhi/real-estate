<?php

namespace App\Service\ForgetPassowrd;

use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgetPasswordService
{
    public function forgotPassword(ForgetPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            return [
                'status' => __($status),
            ];
        }
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }

    public function showResetForm(string $token)
    {
        return ['token' => $token];
    }
}
