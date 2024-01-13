<?php

namespace App\Service\Frontend;

use App\helpers\ApiResponse;
use App\Http\Requests\Frontend\RegisterRequest;
use App\Jobs\RegistrationAgora;
use App\Models\User;
use App\Traits\ImageUpload;

class RegisterService
{
    use ImageUpload;

    public function store(RegisterRequest $request)
    {
        $user = User::create(
            [
                'image' => $this->uploadImage('user_image'),
            ] + $request->validated(),
        );

        RegistrationAgora::dispatch($user);

        return ApiResponse::createSuccessResponse();
    }
}
