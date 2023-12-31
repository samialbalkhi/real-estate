<?php
namespace App\Service\ForgetPassowrd;

use Illuminate\Support\Str;
use App\helpers\ApiResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\ResetPasswordRequest;

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
        return Password::reset($request->only('email', 'password', 'password_confirmation', 'token'),
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
