<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthAdminRequest;
use App\Service\Backend\AuthAdminService;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthAdminRequest $request, AuthAdminService $authAdminService)
    {
        return response()->json($authAdminService->login($request));

    }
}
