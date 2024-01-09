<?php

namespace App\Service\Frontend;

use App\Models\User;
use App\Traits\ImageUpload;
use App\helpers\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Http\Resources\Frontend\GetProfileUserResource;

class ProfileUserService
{
    use ImageUpload;

    public function getProfileUser()
    {
        return new GetProfileUserResource(User::find(auth()->user()->id));
    }

    public function profileUser(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $updatedFields = $this->getUpdatedFields($request, $user);

        if ($request->filled('old_password')) {
            if (!$this->checkPassword($user, $request->old_password)) {
                return $this->responseError();
            }

            $updatedFields['password'] = $request->new_password;
        }
        $this->updateImage($user);
        $user->update($updatedFields);

        return $this->responseSuccess();
    }

    public function logoutUser()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();

        return ApiResponse::logoutSuccessResponse();
    }

    private function responseError()
    {
        throw ValidationException::withMessages([
            'error' => ['old password  not correct'],
        ]);
    }

    private function responseSuccess()
    {
        return response()->data(key: 'success', message: 'update profile sucessfully', statusCode: 200);
    }

    private function checkPassword($admin, $old_password)
    {
        return Hash::check($old_password, $admin->password);
    }

    private function getUpdatedFields(UpdateProfileRequest $request, $admin)
    {
        return [
            'name' => $request->input('name', $admin->name),
            'email' => $request->input('email', $admin->email),
            'phone' => $request->input('phone', $admin->phone),
            'image' => $this->uploadImage('user_image'),
        ];
    }
}
