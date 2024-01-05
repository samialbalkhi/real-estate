<?php
namespace App\Service\Frontend;

use App\Models\View;
use App\Models\Advertisement;
use Spatie\Activitylog\Models\Activity;

class GetSimilarAdvertisementService
{
    public function getSimilarAdvertisement(Advertisement $advertisement)
    {
        $userViews = Activity::where('subject_type', View::class)
            ->where('causer_id', auth()->user()->id)
            ->where('log_name', 'default')
            ->get();
        dd($userViews);
        // Extract advertisement IDs from the userViews collection
        $advertisementIds = $userViews->pluck('subject_id')->toArray();

        // Retrieve similar ads based on the user's viewed advertisements
        $similarAdvertisements = Advertisement::whereIn('id', $advertisementIds)
            ->where('id', '!=', $advertisement->id)
            ->limit(5)
            ->get();

        return $similarAdvertisements->toArray();
    }
}
