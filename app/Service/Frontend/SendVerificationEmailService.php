<?php

namespace App\Service\Frontend;

use App\Models\ValidationCode;
use App\Jobs\SendVerificationCode;
use App\Http\Requests\Frontend\SendCodeRequest;

class SendVerificationEmailService
{
    public function sendcode(SendCodeRequest $request)
    {
        $code = random_int(100000, 999999);

        if (ValidationCode::where('code', $code)->exists()) {
            do {
                $code = random_int(100000, 999999);
            } while (ValidationCode::where('code', $code)->exists());
        }

        ValidationCode::create([
            'code' => $code,
            'user_id' => auth()->user()->id,
            'created_at' => now(),
        ]);

        SendVerificationCode::dispatch($request->email, ['code' => $code]);
    }
}
