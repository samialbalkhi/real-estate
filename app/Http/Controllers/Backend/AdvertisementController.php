<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\AdvertisementRequest;

class AdvertisementController extends Controller
{
    public function index()
    {
    }

    public function edit(Advertisement $advertisement)
    {
    }

    public function update(AdvertisementRequest $request, Advertisement $advertisement)
    {
    }
}
