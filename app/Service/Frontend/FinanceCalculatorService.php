<?php

namespace App\Service\Frontend;

use App\Http\Requests\Frontend\FinanceCalculatorRequeset;
use App\Models\FinanceCalculator;

class FinanceCalculatorService
{
    public function totalFinancingCalculator(FinanceCalculatorRequeset $request)
    {
        FinanceCalculator::create($request->validated());
        $downPaymentAmount = ($request->property_value * $request->down_payment_percentage) / 100;
        $loanAmount = $request->property_value - $downPaymentAmount;
        $loanTermInYears = $request->loan_term_id;
        $loanTermInMonths = $loanTermInYears * 12;

        $monthlyPayment = round($loanAmount / $loanTermInMonths, 2);

        return ['monthly_payment' => $monthlyPayment];
    }
}
