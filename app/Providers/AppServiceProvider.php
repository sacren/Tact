<?php

namespace App\Providers;

use App\Services\TransactionService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TransactionService::class, function () {
            return new TransactionService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('version', '1.0.0');
    }
}
