<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service\Backend\OrderCountService;
use Illuminate\Http\Request;

class OrderCountController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, OrderCountService $orderCountService)
    {
        return response()->json([
            $orderCountService->orderCount(),
        ]);
    }
}
