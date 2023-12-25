<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\AuthAdminService;
use App\Http\Requests\Frontend\AuthRequest;

class AuthAdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $request, AuthAdminService $authAdminService)
    {
        return response()->json($authAdminService->login($request));
    }
}
