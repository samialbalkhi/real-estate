<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Service\Backend\ProfileAdminService;

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

    public function logout()
    {
        return response()->json(
            $this->profileAdminService->logout()
        );
    }
}
