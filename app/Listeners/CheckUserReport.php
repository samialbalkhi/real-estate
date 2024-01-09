<?php

namespace App\Listeners;

use App\Events\ReportCreated;
use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CheckUserReport implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReportCreated $event): void
    {
        Log::debug('handle event.');
        $userId = $event->report->reportedUser->id;
        Log::debug('handle event. ' . $userId);
        $userReportedCount = Report::where('reported_user_id', $userId)->count();
        Log::debug('handle event. ' . $userReportedCount);

        if ($userReportedCount > 10) {
            Log::debug('handle event. true');
            $user = User::find($userId);

            $user->delete();

            return;
        }
    }
}
