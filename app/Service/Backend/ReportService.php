<?php

namespace App\Service\Backend;

use App\Models\Report;
use Illuminate\Support\Facades\DB;

class ReportService
{
    public function index()
    {
        return
            DB::table('reports')
                ->select(
                    'reporters.id as reporter_id',
                    'reporters.name as reporter_name',
                    'reported_users.id as reported_user_id',
                    'reported_users.name as reported_user_name',
                    DB::raw('GROUP_CONCAT(reports.reason) as reasons'),
                    DB::raw('count(*) as report_count')
                )
                ->join('users as reporters', 'reporters.id', '=', 'reports.user_id')
                ->join('users as reported_users', 'reported_users.id', '=', 'reports.reported_user_id')
                ->groupBy('reporters.id', 'reporters.name', 'reported_users.id', 'reported_users.name')
                ->paginate();
    }

    public function show(Report $report)
    {
        return $report->with('user:id,name', 'reportedUser:id,name')->find($report->id);
    }
}
