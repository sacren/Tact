<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::pattern('budgetId', '[1-9][0-9]*');
        Route::pattern('year', '19[0-9]{2}|20(0[0-9]|1[0-9]|2[0-5])');
        Route::pattern('month', '0?[1-9]|1[0-2]');
    }
}
