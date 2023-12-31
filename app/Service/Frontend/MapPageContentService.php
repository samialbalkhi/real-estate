<?php
namespace App\Service\Frontend;

use App\Models\RealEstateCategory;

class MapPageContentService
{
    public function viewCategory()
    {
        return RealEstateCategory::Active()
            ->select('id', 'name')
            ->paginate();
    }
}
