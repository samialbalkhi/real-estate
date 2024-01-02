<?php

namespace App\Service\Frontend;

use App\Http\Resources\Frontend\AdvertisementResource;
use App\Models\Advertisement;

class ViewAdvertisementServeice
{
    public function viewAdvertisement(Advertisement $advertisement)
    {
        return AdvertisementResource::collection(
            Advertisement::Active()->where('real_estate_category_id', $advertisement->id)->get());
    }
}
