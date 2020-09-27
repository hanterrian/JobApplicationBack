<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\LogoutController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Location\CityController;
use App\Http\Controllers\Api\v1\Location\CountryController;
use App\Http\Controllers\Api\v1\Location\RegionController;
use App\Http\Controllers\Api\v1\Order\CategoryController;
use App\Http\Controllers\Api\v1\Order\CurrencyController;
use App\Http\Controllers\Api\v1\Order\OrderController;
use App\Http\Controllers\Api\v1\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['json.response']], function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'v1'], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('register', [RegisterController::class, 'index']);
            Route::post('register-check', [RegisterController::class, 'check']);
            Route::post('register-token', [RegisterController::class, 'token']);
            Route::post('login', [LoginController::class, 'index']);
            Route::post('login-token', [LoginController::class, 'token']);
            Route::post('logout', [LogoutController::class, 'index'])->middleware('auth:api');
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('profile', [ProfileController::class, 'current'])->middleware('auth:api');
            Route::get('profile/{profile}', [ProfileController::class, 'show']);
            Route::post('profile', [ProfileController::class, 'update'])->middleware('auth:api');
        });
        Route::group(['prefix' => 'order'], function () {
            Route::apiResource('order', OrderController::class)->only(['index', 'show']);
            Route::apiResource('order', OrderController::class)->middleware('auth:api')->except(['index', 'show']);
            Route::apiResource('currency', CurrencyController::class)->only(['index']);
            Route::apiResource('category', CategoryController::class)->only(['index']);
        });
        Route::group(['prefix' => 'location'], function () {
            Route::resource('countries', CountryController::class)->only(['index']);
            Route::resource('regions', RegionController::class)->only(['index']);
            Route::resource('cities', CityController::class)->only(['index']);
        });
    });
});
