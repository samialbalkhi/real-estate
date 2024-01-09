<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\NotificationServeice;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NotificationServeice $notificationServeice)
    {
        return response()->json($notificationServeice->store());
    }
}
