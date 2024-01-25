<?php

namespace App\Service\Frontend;

use App\Http\Requests\Frontend\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthUserService
{
    public function login(AuthRequest $request)
    {
        if ($this->reportUser($request)) {
            return $this->existsReportErorr();
        }

        $user = User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email or password not correct'],
            ]);
        }

        return ['token' => $user->createToken('token-name', ['user'])->plainTextToken];
    }

    private function reportUser($request)
    {
        return User::where('status', false)
            ->whereEmail($request->email)
            ->first();
    }

    private function existsReportErorr()
    {
        return response()
        ->data(key: 'error', 
        message: 'The account has been blocked', 
        statusCode: 403);
    }
}
