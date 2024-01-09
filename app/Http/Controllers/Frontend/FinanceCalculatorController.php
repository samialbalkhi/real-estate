<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FinanceCalculatorRequeset;
use App\Service\Frontend\FinanceCalculatorService;
use Illuminate\Http\Request;

class FinanceCalculatorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FinanceCalculatorRequeset $request, FinanceCalculatorService $financeCalculatorService)
    {
        return response()->json(
            $financeCalculatorService->totalFinancingCalculator($request));
    }
}
