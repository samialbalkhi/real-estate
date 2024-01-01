<?php
namespace App\Service\Frontend;

use App\Models\Offer;

class ViewOfferService
{
    public function index()
    {
        return Offer::Active()->get(['id', 'name', 'image']);
    }
}
