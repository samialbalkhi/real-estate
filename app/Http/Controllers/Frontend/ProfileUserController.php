<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Service\Frontend\ProfileUserService;

class ProfileUserController extends Controller
{
    public function __construct(private ProfileUserService $profileAdminService)
    {
    }

    public function getProfileUser()
    {
        return response()->json(
            $this->profileAdminService->getProfileUser()
        );
    }

    public function profileUser(UpdateProfileRequest $request)
    {
        return response()->json(
            $this->profileAdminService->profileUser($request)
        );
    }

    public function logoutUser()
    {
        return response()->json(
            $this->profileAdminService->logoutUser()
        );
    }
}
