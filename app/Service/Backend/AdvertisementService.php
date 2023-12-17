<?php

namespace App\Service\Backend;

use App\Models\Advertisement;
use App\Http\Requests\backend\AdvertisementRequest;

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
    }
}
