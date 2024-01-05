<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\FinanceCalculatorService;
use App\Http\Requests\Frontend\FinanceCalculatorRequeset;

class FinanceCalculatorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FinanceCalculatorRequeset $request, FinanceCalculatorService $financeCalculatorService)
    {
        return response()->json(
            $financeCalculatorService->total_financing_calculator($request));
    }
}
