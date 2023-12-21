<?php

namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Traits\ImageUpload;

class ProfileAdminService
{
    use ImageUpload;
    public function getProfile()
    {
        return User::find(auth()->user()->id);
    }

    public function profileAdmin(UpdateProfileRequest $request)
    {
        $admin = auth()->user();
        $this->updateImage($admin);
        $updatedFiled = $this->updatedFiled($request);

        if ($request->old_password) {
            if ($this->cheackPassword($admin, $request->old_password) == true) {
                $updatedFiled = array_merge($this->updatedFiled($request), [
                    'password' => $request->new_password,
                ]);
            } else {
                return $this->responseError();
            }
        }
        auth()
            ->user()
            ->update($updatedFiled);

        return $this->responseSuccess();
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();
    }

    private function responseError()
    {
        return response()->data(
            key: 'error',
            message: 'old password  not correct',
            statusCode: 422
        );
    }


    private function responseSuccess()
    {
        return response()->data(
            key: 'success',
            message: 'update profile sucessfully',
            statusCode: 200
        );
    }


    private function cheackPassword($admin, $old_password)
    {
        if (Hash::check($old_password, $admin->password)) return true;
        return false;
    }

    private function updatedFiled($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $this->uploadImage('user_image'),
        ];
    }
}
