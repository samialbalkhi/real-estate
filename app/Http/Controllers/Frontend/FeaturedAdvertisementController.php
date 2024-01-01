<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\FeaturedAdvertisementService;

class FeaturedAdvertisementController extends Controller
{
    public function index(FeaturedAdvertisementService $service)
    {
        return response()->json($service->index());
    }
}
