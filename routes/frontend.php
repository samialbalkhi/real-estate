<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthUserController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\SendVerificationEmailController;


Route::prefix('user')->group(function () {
    Route::post('login', AuthUserController::class);
});
Route::post('register', RegisterController::class, 'store');

Route::post('sendCode', SendVerificationEmailController::class, 'sendCode');

