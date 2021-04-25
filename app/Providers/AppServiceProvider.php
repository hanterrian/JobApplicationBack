<?php

namespace App\Providers;

use Carbon\Carbon;
use Encore\Admin\Config\Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $table = config('admin.extensions.config.table', 'admin_config');

        if (Schema::hasTable($table)) {
            Config::load();
        }

        Paginator::defaultView('components/paginator');

        Carbon::setLocale(app()->getLocale());
    }
}
