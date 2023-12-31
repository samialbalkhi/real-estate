<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthUserController;
use App\Http\Controllers\Frontend\RegisterController;

use App\Http\Controllers\Frontend\VerifyCodeController;
use App\Http\Controllers\Frontend\ViewCategoryController;
use App\Http\Controllers\Frontend\ViewHomepageController;
use App\Http\Controllers\Frontend\ViewAdvertisementController;
use App\Http\Controllers\Frontend\SendVerificationEmailController;

Route::prefix('user')->group(function () {
    Route::post('login', AuthUserController::class);
});
Route::post('register', RegisterController::class, 'store');

Route::group(['middleware' => ['auth:sanctum', 'abilities:user']], function () {
    Route::post('sendCode', SendVerificationEmailController::class, 'sendCode');
    Route::post('verifyCode', VerifyCodeController::class, 'verifyCode');

    Route::prefix('viewHomePage')->group(function () {
        Route::get('index', ViewHomepageController::class);
    });
    Route::prefix('mapPageContent')->group(function () {
        Route::get('viewCategory', ViewCategoryController::class);
        Route::get('viewAdvertisement/{advertisement}', ViewAdvertisementController::class);
        Route::get('ViewAdvertisementDetail/{advertisement}', ViewAdvertisementController::class);

    });
});
