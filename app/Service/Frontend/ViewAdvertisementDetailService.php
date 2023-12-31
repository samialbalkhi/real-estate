<?php
namespace App\Service\Frontend;

use App\Models\Advertisement;

class ViewAdvertisementDetailService
{
    public function ViewAdvertisementDetail(Advertisement $advertisement)
    {
        return $advertisement ;
    }
}
