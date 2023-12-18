<?php

use App\Http\Controllers\Backend\AccountTypeController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\AuthAdminController;
use App\Http\Controllers\Backend\HomePageContentController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RealEstateCategoryController;
use App\Http\Controllers\Backend\RealEstateTypeController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
});

Route::post('login', AuthAdminController::class);

Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {

    Route::get('edit/{homePageContent}', [HomePageContentController::class, 'edit']);
    Route::post('update/{homePageContent}', [HomePageContentController::class, 'update']);

    Route::resource('sections', SectionController::class);
    Route::resource('accountTypes', AccountTypeController::class);
    Route::resource('realEstateCategories', RealEstateCategoryController::class);
    Route::get('realEstateTypes', RealEstateTypeController::class);

    Route::prefix('order')->group(function () {
        Route::get('index', [OrderController::class, 'index']);
        Route::get('show/{order}', [OrderController::class, 'show']);
    });

    Route::prefix('advertisement')->group(function () {
        Route::get('index', [AdvertisementController::class, 'index']);
        Route::get('edit/{advertisement}', [AdvertisementController::class, 'edit']);
        Route::patch('update/{advertisement}', [AdvertisementController::class, 'update']);
    });

    Route::resource('offers', OfferController::class);
    Route::resource('products', ProductController::class);

    Route::prefix('reviews')->group(function () {
        Route::get('index', ReviewController::class);
    });
});
