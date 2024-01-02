<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Service\Frontend\FeaturedAdvertisementService;

class FeaturedAdvertisementController extends Controller
{
    public function __construct(private FeaturedAdvertisementService $featuredAdvertisementService)
    {
    }

    public function index()
    {
        return response()->json(
            $this->featuredAdvertisementService->index());
    }

    public function show(Advertisement $advertisement)
    {
        return response()->json(
            $this->featuredAdvertisementService->show($advertisement));
    }
}
