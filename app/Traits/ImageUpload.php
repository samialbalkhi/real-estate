<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function uploadImage($folder)
    {
        if (request()->file('image'))
            return request()
                ->file('image')
                ->store($folder, 'public');
        

        return null;
    }

    public function deleteImage($folder)
    {
        if (Storage::exists('public/' . $folder->image)) {
            Storage::delete('public/' . $folder->image);
        }
    }

    public function updateImage($folder)
    {
        $this->deleteImage($folder);
    }
}
