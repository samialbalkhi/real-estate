<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\AuthUserService;
use App\Http\Requests\Frontend\AuthRequest;

class AuthUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $request,AuthUserService $authUserService)
    {
        return response()->json($authUserService->login($request));
    }
}
