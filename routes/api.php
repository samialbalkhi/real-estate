<?php
use App\Http\Controllers\Backend\{
    AccountTypeController,
    AdvertisementController,
    AdvertisementCountController,
    AuthAdminController,
    HomePageContentController,
    OfferController,
    OrderController,
    OrderCountController,
    ProductController,
    ProfileAdminController,
    RealEstateCategoryController,
    RealEstateTypeController,
    ReportController,
    ReviewController,
    UserCountController,
};
use App\Http\Controllers\ForgetPassword\{
    ForgetPasswordController,
    ResetPasswordController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
});

Route::post('login', AuthAdminController::class);

Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    Route::get('edit/{homePageContent}', [HomePageContentController::class, 'edit']);
    Route::post('update/{homePageContent}', [HomePageContentController::class, 'update']);

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

    Route::prefix('reports')->group(function () {
        Route::get('index', [ReportController::class, 'index']);
        Route::get('show/{report}', [ReportController::class, 'show']);
    });

    Route::get('userCount', UserCountController::class);
    Route::get('orderCount', OrderCountController::class);
    Route::get('advertisementCount', AdvertisementCountController::class);

    Route::get('getProfile', [ProfileAdminController::class, 'getProfile']);
    Route::post('profileAdmin', [ProfileAdminController::class, 'profileAdmin']);
    Route::get('logout', [ProfileAdminController::class, 'logout']);
});

Route::post('forgot-password', ForgetPasswordController::class);

Route::post('reset-password', ResetPasswordController::class);
