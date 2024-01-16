<?php

namespace App\Service\Frontend;

use App\Http\Resources\Frontend\ShowAdvertisementResource;
use App\Models\Advertisement;
use App\Models\View;
use Spatie\Activitylog\Models\Activity;

class ShowAdvertisementService
{
    public function show(Advertisement $advertisement)
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($advertisement)
            ->log('view');

        $this->createOrUpdateView($advertisement);
        $referenceAdvertisements = $this->getReferenceAdvertisements();

        $similarAdvertisements = $this->querySimilarAdvertisements($referenceAdvertisements);

        return ['advertisements' => new ShowAdvertisementResource($advertisement),
            'similarAdvertisements' => $similarAdvertisements];
    }

    private function createOrUpdateView($advertisement)
    {
        $view = View::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'advertisement_id' => $advertisement->id,
            ],
            [],
        );

        return $view;
    }

    private function getReferenceAdvertisements()
    {
        $activities = Activity::where('causer_id', auth()->id)
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
