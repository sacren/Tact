<?php

namespace App\Providers;

use App\Contracts\PaymentProcessor;
use App\Services\Stripe;
use App\Services\TransactionService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

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

        $this->app->singleton(PaymentProcessor::class, function (Application $app) {
            return $app->make(Stripe::class, [
                'config' => [1, 2, 3],
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
