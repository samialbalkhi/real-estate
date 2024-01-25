<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Report;
use App\Events\ReportCreated;
use App\Mail\SeendMessageBlocking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $userId = $event->report->reportedUser->id;

        $user = User::find($userId);
        if ($user) {
            $reportCount = Report::where('reported_user_id', $userId)->count();

            if ($reportCount > 10) {
                User::where('id', $userId)->update(['status' => false]);
                DB::table('personal_access_tokens')
                ->where('tokenable_id', $userId)
                ->where('tokenable_type', User::class)  
                ->delete();
                Mail::to($user->email)->send(new SeendMessageBlocking(['message' =>
                 'Your account has been blocked due to multiple reports.
                  If you have any concerns, please contact support.']));
            }
        }
    }
}
