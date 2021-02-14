<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\ChatController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('orders', OrderController::class);

Route::prefix('chat')->group(function () {
    Route::get('list', [ChatController::class, 'index'])->name('chats');
    Route::get('view/{order}', [ChatController::class, 'view'])->name('chat');
    Route::post('create/{order}', [ChatController::class, 'create'])->name('chat-create');
    Route::post('update/{order}/{message}', [ChatController::class, 'update'])->name('chat-update');
    Route::post('delete/{order}/{message}', [ChatController::class, 'delete'])->name('chat-delete');
});

Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'auth'])->name('auth');
    Route::get('verify/{hash}', [LoginController::class, 'verify'])->name('verify');
    Route::post('verify/{hash}', [LoginController::class, 'verifyCheck'])->name('verify-check');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

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
