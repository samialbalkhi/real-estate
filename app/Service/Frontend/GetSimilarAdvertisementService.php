<?php
namespace App\Service\Frontend;

use App\Models\View;
use App\Models\Advertisement;
use Spatie\Activitylog\Models\Activity;

class GetSimilarAdvertisementService
{
    public function getSimilarAdvertisement(Advertisement $advertisement)
    {
        return Advertisement::where('id', '!=', $advertisement->id)
            ->whereBetween('width_street', [$advertisement->width_street - 5, $advertisement->width_street + 5])
            ->where('number_of_room', $advertisement->number_of_room)
            ->limit(5)
            ->paginate(5);
    }
}
