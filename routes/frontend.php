<?php

use App\Http\Controllers\Frontend\AuthUserController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\SendVerificationEmailController;

use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::post('login', AuthUserController::class);
});
Route::post('register', RegisterController::class, 'store');

Route::post('sendCode', SendVerificationEmailController::class, 'sendCode');

