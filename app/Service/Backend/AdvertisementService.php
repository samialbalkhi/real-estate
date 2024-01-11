<?php

namespace App\Service\Backend;

use App\helpers\ApiResponse;
use App\Http\Requests\backend\AdvertisementRequest;
use App\Models\Advertisement;

class AdvertisementService
{
    public function index()
    {
        return Advertisement::paginate();
    }

    public function edit(Advertisement $advertisement)
    {
        return $advertisement;
    }
        
    public function update(AdvertisementRequest $request, Advertisement $advertisement)
    {
        $advertisement->update([
            'status' => $request->status,
            'featured' => $request->featured,
        ]);

        return ApiResponse::updateSuccessResponse();

    }
}
