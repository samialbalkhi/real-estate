<?php

namespace App\Service\ForgetPassowrd;

use App\helpers\ApiResponse;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\ResetPassword;
use App\Models\User;

class ResetPasswordService
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        $code = ResetPassword::where('code', $request->code)->first();

        if (! $code == $request->code) {
            return 'Unfortunately, the code is invalid !!';
        }

        $user = User::whereEmail($request->email)->first();
        $user->update([
            'password' => $request->password,
        ]);

        return ApiResponse::updateSuccessResponse();
    }
}
