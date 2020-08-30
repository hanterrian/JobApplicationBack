<?php

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

    Route::group(['namespace' => 'Api'], function () {
        Route::group(['prefix' => 'v1', 'namespace' => 'v1'], function () {
            Route::group(['namespace' => 'Auth'], function () {
                Route::post('register', 'RegisterController@index');
                Route::post('register-check', 'RegisterController@check');
                Route::post('register-token', 'RegisterController@token');
                Route::post('login', 'LoginController@index');
                Route::post('login-token', 'LoginController@token');
                Route::post('logout', 'LogoutController@index')->middleware('auth:api');
            });
            Route::group(['namespace' => 'User', 'middleware' => ['auth:api']], function () {
                Route::get('profile', 'ProfileController@show');
                Route::post('profile', 'ProfileController@update');
            });
            Route::group(['namespace' => 'Order'], function () {
                Route::resource('order', 'OrderController')->only(['index', 'show']);
                Route::resource('order', 'OrderController')->middleware('auth:api')->except(['index', 'show']);
                Route::resource('category', 'CategoryController', ['only' => ['index']]);
            });
            Route::group(['namespace' => 'Location', 'prefix' => 'location'], function () {
                Route::resource('countries', 'CountryController', ['only' => ['index']]);
                Route::resource('regions', 'RegionController', ['only' => ['index']]);
                Route::resource('cities', 'CityController', ['only' => ['index']]);
            });
        });
    });
});
