<?php

namespace App\Service\Backend;

use App\Models\Advertisement;

class AdvertisementCountService
{
    public function advertisementCount()
    {

        return ['advertisement_count' => Advertisement::count()];
    }
}
