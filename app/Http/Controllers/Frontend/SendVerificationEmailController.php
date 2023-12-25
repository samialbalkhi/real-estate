<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\SendVerificationEmailService;

class SendVerificationEmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, SendVerificationEmailService $service)
    {
        $service->sendcode($request);
        return response()->json(['message' => 'Verification email sent successfully']);
    }
}
