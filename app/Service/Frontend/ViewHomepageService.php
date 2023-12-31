<?php
namespace App\Service\Frontend;

use App\Models\HomePageContent;

class ViewHomepageService
{
    public function index()
    {
        return HomePageContent::get(['description', 'image']);
    }
}
