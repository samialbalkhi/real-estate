<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewAdvertisementServeice;

class ViewAdvertisementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ViewAdvertisementServeice $viewAdvertisementServeice, Advertisement $advertisement)
    {
        return response()->json(
            $viewAdvertisementServeice->viewAdvertisement($advertisement));
    }
}
