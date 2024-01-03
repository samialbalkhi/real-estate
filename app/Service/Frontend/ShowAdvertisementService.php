<?php
namespace App\Service\Frontend;

use App\Models\View;
use App\Models\Advertisement;
use App\Http\Resources\Frontend\ShowAdvertisementResource;

class ShowAdvertisementService
{
    public function show(Advertisement $advertisement)
    {
        if (!$this->existingView($advertisement)) {
            View::create([
                'user_id' => auth()->user()->id,
                'advertisement_id' => $advertisement->id,
            ]);
        }

        return new ShowAdvertisementResource($advertisement);
    }

    private function existingView($advertisement)
    {
        return View::where('user_id', auth()->user()->id)
            ->where('advertisement_id', $advertisement->id)
            ->first();
    }
}
