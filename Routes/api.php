<?php

use Illuminate\Support\Facades\Route;
use Modules\Reviews\Http\Controllers\ProfileReviewsController;
use Modules\Reviews\Http\Controllers\ReviewUserProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'reviews'], function () {
    Route::get('/profile/{userProfile:id}', ProfileReviewsController::class);
    Route::post('/review/{userProfile:id}', ReviewUserProfileController::class);
});
