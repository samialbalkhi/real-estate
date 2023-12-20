<?php

namespace App\Service\Backend;

use App\Http\Requests\Backend\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileAdminService
{
    public function getProfile()
    {
        return User::find(auth()->user()->id);
    }

    public function profileAdmin(UpdateProfileRequest $request)
    {
        $admin = auth()->user();

        if ($request->old_password) {
            if ($this->cheackPassword($admin, $request->old_password) == true) {
                $nameAndEmail = array_merge($this->updatedFiled($request), [
                    'password' => $request->new_password,
                ]);
            } else {
                return $this->responseError();
            }
        }
        auth()
            ->user()
            ->update($nameAndEmail);

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
            key: 'error',
            message: 'old password  not correct',
            statusCode: 422
        );
    }

    private function cheackPassword($admin, $old_password)
    {
        if (Hash::check($old_password, $admin->password)) {
            return true;
        }

        return false;
    }

    private function updatedFiled($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
        ];
    }
}
