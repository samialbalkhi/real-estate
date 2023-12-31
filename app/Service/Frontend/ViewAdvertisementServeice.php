<?php
namespace App\Service\Frontend;

use App\Models\Advertisement;

class ViewAdvertisementServeice
{
    public function viewAdvertisement(Advertisement $advertisement)
    {
        return Advertisement::where('real_estate_category_id', $advertisement->id)
        ->get(['id', 'lat', 'lng', 'real_estate_category_id']);
    }
}
