<?php
namespace App\Service\Frontend;
use Spatie\Activitylog\Models\Activity;

use App\Models\View;
use App\Models\Advertisement;
use App\Http\Resources\Frontend\ShowAdvertisementResource;

class ShowAdvertisementService
{
    public function show(Advertisement $advertisement)
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($advertisement)
            ->log('view');

        $this->createOrUpdateView($advertisement);

        return new ShowAdvertisementResource($advertisement);
    }

    private function createOrUpdateView($advertisement)
    {
        $view = View::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'advertisement_id' => $advertisement->id,
            ],
            [],
        );

        return $view;
    }
}
