<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SendCodeRequest;
use App\Service\Frontend\SendVerificationEmailService;
use Illuminate\Http\Request;

class SendVerificationEmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SendCodeRequest $request, SendVerificationEmailService $service)
    {
        $service->sendcode($request);

        return response()->json(['message' => 'Verification email sent successfully']);
    }
}
