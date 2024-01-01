<?php
namespace App\Service\Frontend;

use App\Models\Advertisement;
use App\Http\Resources\Frontend\AdvertisementResource;

class ViewAdvertisementServeice
{
    public function viewAdvertisement(Advertisement $advertisement)
    {
        return AdvertisementResource::collection(
            Advertisement::where('real_estate_category_id', $advertisement->id)->get());
    }
}
