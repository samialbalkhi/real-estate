<?php
namespace App\Service\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Frontend\AuthRequest;
use Illuminate\Validation\ValidationException;

class AuthUserService {

    public function login(AuthRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {

            throw ValidationException::withMessages([
                'email' => ['Email or password not correct']]);
        }

        return ['token' => $user->createToken('token-name', ['user'])->plainTextToken];
    }
}