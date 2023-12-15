<?php

namespace App\Service\Backend;

use App\Models\RealEstateType;

class RealEstateTypeService
{
    public function index()
    {
        return RealEstateType::get(['id', 'name']);
    }
}
