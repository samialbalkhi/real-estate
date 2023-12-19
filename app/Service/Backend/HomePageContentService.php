<?php

namespace App\Service\Backend;

use App\Http\Requests\Backend\HomePageContentRequest;
use App\Models\HomePageContent;
use App\Traits\ImageUploadTrait;

class HomePageContentService
{
    use ImageUploadTrait;

    public function edit(HomePageContent $homePageContent)
    {
        return $homePageContent;
    }

    public function update(HomePageContentRequest $request, HomePageContent $homePageContent)
    {
        $this->updateImage($homePageContent);

        $homePageContent->update([
            'image' => $this->uploadImage('home_page_image'),
        ]
            + $request->validated());
    }
}
