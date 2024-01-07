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
            return $this->erorrResponse();
        }

        $report = Report::create([
            'reason' => $request->reason,
            'user_id' => auth()->user()->id,
            'reported_user_id' => $request->reported_user_id,
        ]);
        ReportCreated::dispatch($report);

        return ApiResponse::createSuccessResponse();
    }

    private function existsReport($request)
    {
        return Report::where('user_id', auth()->user()->id)
            ->where('reported_user_id', $request->reported_user_id)
            ->exists();
    }
    public function erorrResponse()
    {
        return response()->data(
            key: 'error',
            message: 'You have already submitted a report for this user.',
            statusCode: 422
        );
    }
}
