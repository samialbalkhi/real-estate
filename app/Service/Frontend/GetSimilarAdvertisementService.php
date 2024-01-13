<?php

namespace App\Service\Frontend;


use App\Models\Advertisement;
use Spatie\Activitylog\Models\Activity;

class GetSimilarAdvertisementService
{
    public function getSimilarAdvertisement()
    {
        $referenceAdvertisements = $this->getReferenceAdvertisements();

        return $this->querySimilarAdvertisements($referenceAdvertisements);
    }

    private function getReferenceAdvertisements()
    {
        $activities = Activity::where('causer_id', auth()->user()->id)
            ->where('causer_type', get_class(auth()->user()))
            ->where('subject_type', Advertisement::class)
            ->get();

        $advertisementIds = $activities->pluck('subject_id');

        return Advertisement::whereIn('id', $advertisementIds)->get();
    }

    private function querySimilarAdvertisements($referenceAdvertisements)
    {
        $roomNumbers = $referenceAdvertisements->pluck('number_of_room')->toArray();
        $width_street = $referenceAdvertisements->pluck('width_street')->toArray();
        $space = $referenceAdvertisements->pluck('space')->toArray();

        $adIdsToExclude = $referenceAdvertisements->pluck('id')->toArray();

        return Advertisement::whereIn('number_of_room', $roomNumbers)
            ->where(function ($query) use ($width_street) {
                foreach ($width_street as $width) {
                    $query->orWhereBetween('width_street', [$width - 5, $width + 5]);
                }
            })
            ->whereNotIn('id', $adIdsToExclude)
            ->limit(5)
            ->paginate(5);
    }
}
