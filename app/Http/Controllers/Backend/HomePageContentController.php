<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\HomePageContentRequest;
use App\Models\HomePageContent;
use App\Service\Backend\HomePageContentService;

class HomePageContentController extends Controller
{
    public function __construct(private HomePageContentService $homePageContentService)
    {
    }

    public function edit(HomePageContent $homePageContent)
    {
        return response()->json(
            $this->homePageContentService->edit($homePageContent)
        );
    }

    public function update(HomePageContentRequest $request, HomePageContent $homePageContent)
    {
        return response()->json(
            $this->homePageContentService->update($request, $homePageContent));

    }
}
