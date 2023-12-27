<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthUserController;
use App\Http\Controllers\Frontend\RegisterController;

use App\Http\Controllers\Frontend\VerifyCodeController;
use App\Http\Controllers\Frontend\SendVerificationEmailController;

Route::prefix('user')->group(function () {
    Route::post('login', AuthUserController::class);
});
Route::post('register', RegisterController::class, 'store');

Route::group(['middleware' => ['auth:sanctum', 'abilities:user']], function () {
    Route::post('sendCode', SendVerificationEmailController::class, 'sendCode');
    Route::post('verifyCode', VerifyCodeController::class, 'verifyCode');
});
