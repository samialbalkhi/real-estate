<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthAdminController;
use App\Http\Controllers\Backend\HomePageContentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {});

Route::post('/login',AuthAdminController::class);

Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {

    Route::get('/edit/{homePageContent}',[HomePageContentController::class,'edit']);
    Route::patch('/update/{homePageContent}',[HomePageContentController::class,'update']);

});
