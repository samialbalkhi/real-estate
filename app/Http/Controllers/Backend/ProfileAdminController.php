<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\ProfileAdminService;
use App\Http\Requests\Backend\UpdateProfileRequest;

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
