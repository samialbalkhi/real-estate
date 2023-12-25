<?php

namespace App\Service\Frontend;

use Illuminate\Http\Request;
use App\Jobs\SendVerificationCode;

class SendVerificationEmailService
{
    public function sendcode(Request $request)
    {
        SendVerificationCode::dispatch($request->email, $request->all());
    }
}
