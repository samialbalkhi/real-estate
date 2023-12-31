<?php

namespace App\Service\Frontend;

use App\Models\Section;

class ViewSectionService
{
    public function viewSection()
    {
        return Section::get(['id', 'name']);
    }
}
