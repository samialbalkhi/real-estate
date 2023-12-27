<?php

namespace App\Service\Frontend;

use App\Jobs\SendVerificationCode;
use App\Models\ValidationCode;
use Illuminate\Http\Request;

class SendVerificationEmailService
{
    public function sendcode(Request $request)
    {
        $code = random_int(100000, 999999);

        ValidationCode::create([
            'code' => $code,
            'user_id' => auth()->user()->id,
            'created_at' => now(),
        ]);

        SendVerificationCode::dispatch($request->email, ['code' => $code]);
    }
}
