<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ReportRequest;
use App\Service\Frontend\UserReportService;

class UserReportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReportRequest $request, UserReportService $userReportService)
    {

        return response()->json($userReportService->store($request));
    }
}
