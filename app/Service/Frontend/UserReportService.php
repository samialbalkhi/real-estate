<?php
namespace App\Service\Frontend;

use App\Models\Report;
use App\helpers\ApiResponse;
use App\Events\ReportCreated;
use App\Http\Requests\Frontend\ReportRequest;
use App\Listeners\CheckUserReport;
class UserReportService
{
    public function store(ReportRequest $request)
    {
        if ($this->existsReport($request)) {
            return $this->existsReportErorr();
        }
        if ($this->UserExist($request)) {
            return $this->UserExistErorr();
        }

        $report = Report::create(['user_id' => auth()->user()->id] + $request->validated());

        ReportCreated::dispatch($report);

        return ApiResponse::createSuccessResponse();
    }

    private function existsReportErorr()
    {
        return response()->data(key: 'error',
        message: 'You have already submitted a report for this user.', 
        statusCode: 422);
    }
    private function UserExist($request)
    {
        return Report::userExist($request->reported_user_id)->exists();
    }

    private function existsReport($request)
    {
        return Report::where('user_id', auth()->user()->id)
            ->where('reported_user_id', $request->reported_user_id)
            ->exists();
    }

    public function UserExistErorr()
    {
        return response()->data(key: 'error', 
        message: 'You cannot report yourself', 
        statusCode: 422);
    }
}
