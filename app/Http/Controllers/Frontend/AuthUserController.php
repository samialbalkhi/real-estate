<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AuthRequest;
use App\Service\Frontend\AuthUserService;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $request, AuthUserService $authUserService)
    {
        return response()->json($authUserService->login($request));
    }
}
