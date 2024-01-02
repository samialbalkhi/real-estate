<?php

namespace App\Service\Frontend;

use App\Http\Resources\Frontend\ViewAllAdvertisementResource;
use App\Models\Advertisement;

class ViewAllAdvertisementService
{
    public function index()
    {
        return $this->advertisementsPaginate();
    }

    private function advertisementsPaginate()
    {
        $advertisements = Advertisement::Active()->paginate(10);

        return [
            'data' => ViewAllAdvertisementResource::collection($advertisements),

            'meta' => [
                'total' => $advertisements->total(),
                'current_page' => $advertisements->currentPage(),
                'total_pages' => $advertisements->lastPage(),
            ],
        ];
    }
}
