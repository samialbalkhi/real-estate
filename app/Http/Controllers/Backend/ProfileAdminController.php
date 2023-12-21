<?php

namespace App\Http\Controllers\Backend;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\ProfileAdminService;
use App\Http\Requests\Backend\UpdateProfileRequest;
=======
use App\Http\Controllers\Controller;
>>>>>>> 9b5495c90298a33c454398db13b0f252829198a3

class ProfileAdminController extends Controller
{
    public function __construct(private ProfileAdminService $profileAdminService)
    {
    }

    public function getProfile()
    {
        return response()->json(
            $this->profileAdminService->getProfile()
        );
    }

    public function profileAdmin(UpdateProfileRequest $request)
    {
        return response()->json(
            $this->profileAdminService->profileAdmin($request)
        );
    }
}
