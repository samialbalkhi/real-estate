<?php

namespace App\Listeners;

use App\Events\ReportCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $user = $event->report->user;
        dd($user->reports()->count() > 10);
        if ($user->reports()->count() > 10) {
            $user->delete();
        }
    }
}
