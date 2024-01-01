<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthUserController;

use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\ViewOfferController;
use App\Http\Controllers\Frontend\VerifyCodeController;
use App\Http\Controllers\Frontend\ShowProductController;
use App\Http\Controllers\Frontend\ViewProductController;
use App\Http\Controllers\Frontend\ViewSectionController;
use App\Http\Controllers\Frontend\ViewCategoryController;
use App\Http\Controllers\Frontend\ViewHomepageController;
use App\Http\Controllers\Frontend\ViewAdvertisementController;
use App\Http\Controllers\Frontend\FeaturedAdvertisementController;
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
        Route::get('viewSections', ViewSectionController::class);
    });

    Route::group(['middleware' => ['web']], function () {
        Route::group(['prefix' => 'wishlist'], function () {
            Route::controller(WishlistController::class)->group(function () {
                Route::post('/store', 'store');
                Route::get('/numberOfAdvertisement', 'numberOfAdvertisement');
                Route::get('/index', 'index');
                Route::delete('/delete/{rowId}', 'delete');
            });
        });
    });

    Route::prefix('featured')->group(function () {
        Route::get('index', [FeaturedAdvertisementController::class, 'index']);
        Route::get('show/{advertisement}', [FeaturedAdvertisementController::class, 'show']);
    });

    Route::prefix('offersAndSpecials')->group(function () {
        Route::get('index', ViewOfferController::class);
        Route::get('index/{product}', ViewProductController::class);
        Route::get('show/{product}', ShowProductController::class);
    });
});
