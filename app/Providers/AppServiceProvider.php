<?php

namespace App\Providers;

use App\Contracts\PaymentProcessor;
use App\Services\Stripe;
use App\Services\TransactionService;
use Illuminate\Support\ServiceProvider;

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

        $this->app->bind(PaymentProcessor::class, function ($app) {
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
