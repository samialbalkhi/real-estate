<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Service\Frontend\UserReportService;
use App\Http\Requests\Frontend\ReportRequest;

class UserReportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReportRequest $request,UserReportService $userReportService)
    {
        
        return $userReportService->store($request);
    }
}
