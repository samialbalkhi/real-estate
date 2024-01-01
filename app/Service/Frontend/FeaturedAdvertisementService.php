<?php
namespace App\Service\Frontend;

use App\Models\Advertisement;
use App\Http\Resources\Frontend\FeaturedAdvertisementResource;

class FeaturedAdvertisementService
{
    public function index()
    {
        return FeaturedAdvertisementResource::collection(
            Advertisement::Active()->paginate(10));
    }
   
}
