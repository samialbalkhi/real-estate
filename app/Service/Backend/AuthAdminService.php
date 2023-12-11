<?php
namespace App\Service\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Backend\AuthAdminRequest;

class AuthAdminService{

    public function login(AuthAdminRequest $request)
    {
        $admin = User::whereEmail($request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) 

            throw ValidationException::withMessages([
                'email' => ['Email or password not correct']]);
           
        return ['token' => $admin->createToken('token-name', ['admin'])->plainTextToken];
    }
}