<?php

namespace App\Service\ForgetPassowrd;

use App\helpers\ApiResponse;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordService
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = $this->updatePassword($request);

        if ($status == Password::PASSWORD_RESET) {
            return ApiResponse::resetPsswordSuccessResponse();
        }

        return response(
            [
                'message' => __($status),
            ],
            500,
        );
    }

    protected function updatePassword(ResetPasswordRequest $request)
    {
        return Password::reset($request->only('email', 'password', 'token'),
            function ($user) use ($request) {
                $this->updateUserPassword($user, $request->password);
                $this->deleteUserTokens($user);
                $this->triggerPasswordResetEvent($user);
            });
    }

    protected function updateUserPassword($user, $password)
    {
        $user
            ->forceFill([
                'password' => $password,
                'remember_token' => Str::random(60),
            ])
            ->save();
    }

    protected function deleteUserTokens($user)
    {
        $user->tokens()->delete();
    }

    protected function triggerPasswordResetEvent($user)
    {
        event(new PasswordReset($user));
    }
}
