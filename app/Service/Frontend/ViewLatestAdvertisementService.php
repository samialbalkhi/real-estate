<?php
namespace App\Service\Frontend;

use App\Http\Resources\Frontend\ViewLatestAdvertisementResource;
use App\Models\Advertisement;

class ViewLatestAdvertisementService
{
    public function viewLatestAdvertisement()
    {
        return ViewLatestAdvertisementResource::collection(
            Advertisement::Active()
                ->take(3)
                ->get(),
        );
    }
}
