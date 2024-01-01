<?php
namespace App\Service\Frontend;

use App\Models\Advertisement;
use App\Http\Resources\Frontend\FeaturedAdvertisementResource;
use App\Http\Resources\Frontend\ShowFeaturedAdvertisementResource;

class FeaturedAdvertisementService
{
   
    public function index()
    {
        return $this->advertisementsPaginate(Advertisement::Active()->paginate(10));
    }
    public function show(Advertisement $advertisement)
    {
        return new ShowFeaturedAdvertisementResource($advertisement);
    }

    private function advertisementsPaginate($advertisements){
        return [
            'data' => FeaturedAdvertisementResource::collection($advertisements),
           
            'meta' => [
                'total' => $advertisements->total(),
                'current_page' => $advertisements->currentPage(),
            ],
        ];
    }
}
