<?php

namespace App\Service\ForgetPassowrd;

use App\Http\Requests\ForgetPasswordRequest;
use App\Jobs\UpdatePassword;
use App\Models\ResetPassword;

class ForgetPasswordService
{
    public function forgotPassword(ForgetPasswordRequest $request)
    {
        $code = random_int(100000, 999999);
        if (ResetPassword::where('code', $code)->exists()) {
            do {
                $code = random_int(100000, 999999);
            } while (ResetPassword::where('code', $code)->exists());
        }

        ResetPassword::create([
            'code' => $code,
            'created_at' => now(),
        ]);

        UpdatePassword::dispatch($request->email, ['code' => $code]);
    }
}
