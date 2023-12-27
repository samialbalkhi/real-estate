<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\VerifyCodeService;
use Illuminate\Http\Request;

class VerifyCodeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, VerifyCodeService $verifyCodeService)
    {
        return response()->json(
            $verifyCodeService->verifyCode($request));
    }
}
