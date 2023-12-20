<?php

namespace App\Service\Backend;

use App\Traits\ImageUpload;
use App\Models\HomePageContent;
use App\Http\Requests\Backend\HomePageContentRequest;

class HomePageContentService
{
    use ImageUpload;

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
