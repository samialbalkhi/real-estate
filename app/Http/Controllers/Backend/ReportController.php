<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Service\Backend\ReportService;

class ReportController extends Controller
{
    public function index(ReportService $service)
    {
        return response()->json($service->index());
    }

    public function show(Report $report, ReportService $service)
    {
        return response()->json($service->show($report));
    }
}
