<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service\Backend\UserCountService;
use Illuminate\Http\Request;

class UserCountController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, UserCountService $userCountService)
    {
        return response()->json(
            $userCountService->userCount()
        );
    }
}
