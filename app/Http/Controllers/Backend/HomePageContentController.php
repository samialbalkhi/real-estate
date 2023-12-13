<?php

namespace App\Http\Controllers\Backend;

use App\helpers\Helpers;
use Illuminate\Http\Request;
use App\Models\HomePageContent;
use App\Http\Controllers\Controller;
use App\Service\Backend\HomePageContentService;
use App\Http\Requests\Backend\HomePageContentRequest;

class HomePageContentController extends Controller
{
    public  function __construct(private HomePageContentService $homePageContentService)
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
        $this->homePageContentService->update($request, $homePageContent);
        return Helpers::updateSuccessResponse();
       
    }
}
