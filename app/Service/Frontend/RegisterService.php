<?php

namespace App\Service\Frontend;

use App\Models\User;
use App\Traits\ImageUpload;
use App\Http\Requests\Frontend\RegisterRequest;


class RegisterService
{
    use ImageUpload;

    public function store(RegisterRequest $request): User
    {
        return User::create([
            'image' => $this->uploadImage('user_image'),
        ] + $request->validated());
    }
}
