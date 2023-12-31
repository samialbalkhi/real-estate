<?php

namespace App\Service\Frontend;

use App\Models\ValidationCode;
use Illuminate\Http\Request;

class VerifyCodeService
{
    public function verifyCode(Request $request)
    {
        $code = ValidationCode::where('code', $request->code)->first();

        if (! $code == $request->code) {

            return 'Unfortunately, the code is invalid !!';
        }

        return 'successfully';
    }
}
