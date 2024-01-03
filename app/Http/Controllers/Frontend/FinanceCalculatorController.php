<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\FinanceCalculator;
use App\Http\Controllers\Controller;
use App\Service\Frontend\FinanceCalculatorService;
use App\Http\Requests\Frontend\FinanceCalculatorRequeset;

class FinanceCalculatorController extends Controller
{
    public function index(FinanceCalculatorRequeset $request, FinanceCalculatorService $financeCalculatorService)
    {
        return response()->json(
            $financeCalculatorService->total_financing_calculator($request));
    }
}
