<?php

namespace App\Service\Frontend;

use App\Models\User;
use GuzzleHttp\Client;
use App\Traits\ImageUpload;
use App\helpers\ApiResponse;
use App\Jobs\RegistrationAgora;
use App\Http\Requests\Frontend\RegisterRequest;

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
