<?php

namespace App\Service\Backend;

use App\helpers\ApiResponse;
use App\Http\Requests\Backend\HomePageContentRequest;
use App\Models\HomePageContent;
use App\Traits\ImageUpload;

class HomePageContentService
{
    use ImageUpload;

    public function edit(HomePageContent $homePageContent)
    {
        return $homePageContent->only('id','description','image');
    }

    public function update(HomePageContentRequest $request, HomePageContent $homePageContent)
    {
        $this->updateImage($homePageContent);

        $homePageContent->update([
            'image' => $this->uploadImage('home_page_image'),
        ]
            + $request->validated());

        return ApiResponse::updateSuccessResponse();

    }
}
