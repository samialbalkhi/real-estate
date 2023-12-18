<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    public function uploadImage($folder)
    {
        $path = request()
            ->file('image')
            ->store($folder, 'public');

        return $path;
    }

    public function deleteImage($folder)
    {
        $imagePath = is_string($folder) ? $folder : $folder->image;
        if (Storage::exists('public/' . $imagePath)) {
            Storage::delete('public/' . $imagePath);
        }
    }

    public function updateImage($folder)
    {
        $this->deleteImage($folder);
    }
}
