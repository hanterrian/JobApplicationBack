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
            Route::group(['namespace' => 'User'], function () {
                Route::resource('profile', 'ProfileController', ['only' => ['show', 'update']]);
            });
            Route::group(['namespace' => 'Order'], function () {
                Route::resource('order', 'OrderController');
            });
        });
    });
});
