<?php

namespace App\Service\Frontend;

use App\Http\Resources\Frontend\AdvertisementResource;
use App\Models\Advertisement;

class ViewAdvertisementServeice
{
    public function viewAdvertisement(Advertisement $advertisement)
    {
        $lat = $advertisement->lat;
        $lng = $advertisement->lng;

        $advertisements = Advertisement::Active()
            ->where('real_estate_category_id', $advertisement->id)
            ->orderByRaw(
                "6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lng) - radians($lng)) +
                sin(radians($lat)) * sin(radians(lat)))",
            )
            ->limit(11)
            ->get();

        return $this->handleEmptyAdvertisements($advertisements);
    }
    private function handleEmptyAdvertisements($advertisements)
    {
        if ($advertisements->isEmpty()) {
            return [
                'key' => 'error',
                'message' => 'No ads found for the specified category',
            ];
        }

        $originalAd = $advertisements->shift();

        return [
            'originalAd' => new AdvertisementResource($originalAd),
            'otherAds' => AdvertisementResource::collection($advertisements),
        ];
    }
}
