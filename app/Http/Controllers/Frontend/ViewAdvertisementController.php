<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Service\Frontend\ViewAdvertisementServeice;
use Illuminate\Http\Request;

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
