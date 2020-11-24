<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
//
//Route::get('register', [
//    'as' => 'register',
//    'uses' => 'Auth\RegisterController@selectType'
//]);
//
//Route::get('register/{type?}', [
//    'as' => 'register-type',
//    'uses' => 'Auth\RegisterController@showForm'
//]);
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('sitemap.xml', function () {
    // create new sitemap object
    $sitemap = App::make('sitemap');

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    $sitemap->setCache('laravel.sitemap', 60);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached()) {
        // add item to the sitemap (url, date, priority, freq)
        $sitemap->add(URL::to('/'), date('Y-m-d'), '1.0', 'daily');
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');
});
