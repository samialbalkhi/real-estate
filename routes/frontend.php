<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\{
    AuthUserController,
    FeaturedAdvertisementController,
    FinanceCalculatorController, 
    NotificationController, 
    ProfileUserController, 
    RegisterController, 
    SendVerificationEmailController, 
    ShowAdvertisementController, 
    ShowProductController, 
    UserAdvertisementController, 
    UserOrderController, 
    UserReportController, 
    UserReviewController, 
    VerifyCodeController, 
    ViewAdvertisementController, 
    ViewAllAdvertisementController,
     ViewCategoryController, 
     ViewHomepageController, 
     ViewLatestAdvertisementController, 
     ViewOfferController, 
     ViewProductController, 
     WishlistController,
     AdvertisingPictureController,

    };

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
    });

    Route::group(['middleware' => ['web']], function () {
        Route::group(['prefix' => 'wishlist'], function () {
            Route::controller(WishlistController::class)->group(function () {
                Route::post('store', 'store');
                Route::get('numberOfAdvertisement', 'numberOfAdvertisement');
                Route::get('index', 'index');
                Route::delete('delete/{rowId}', 'delete');
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

    Route::prefix('advertisement')->group(function () {
        Route::get('index', ViewAllAdvertisementController::class);
        Route::get('show/{advertisement}', ShowAdvertisementController::class);
    });

    Route::prefix('order')->group(function () {
        Route::resource('userOrders', UserOrderController::class);
    });

    Route::post('financeCalculator', FinanceCalculatorController::class);

    Route::get('viewLatestAdvertisement', ViewLatestAdvertisementController::class);

    Route::post('rating', UserReviewController::class);

    Route::post('report', UserReportController::class);

    Route::resource('userAdvertisements', UserAdvertisementController::class);

    Route::get('getProfileUser', [ProfileUserController::class, 'getProfileUser']);
    Route::post('profileUser', [ProfileUserController::class, 'profileUser']);
    Route::get('logoutUser', [ProfileUserController::class, 'logoutUser']);

    Route::get('notifications', NotificationController::class);

    Route::resource('advertisingPicture', AdvertisingPictureController::class);
});
