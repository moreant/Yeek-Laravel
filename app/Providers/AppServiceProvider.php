<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// https://blog.csdn.net/qq_37788558/article/details/81663609
use Illuminate\Support\Facades\Schema;

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
        // https://blog.csdn.net/qq_37788558/article/details/81663609
        Schema::defaultStringLength(191);
    }
}
