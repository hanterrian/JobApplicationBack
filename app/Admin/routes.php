<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('categories', 'CategoryController');
    $router->resource('countries', 'CountryController');
    $router->resource('regions', 'RegionController');
    $router->resource('cities', 'CityController');
    $router->resource('orders', 'OrderController');
    $router->resource('currencies', 'CurrencyController');
    $router->resource('users', 'UserController');
});
