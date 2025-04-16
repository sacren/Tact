<?php

namespace App\Providers;

use App\Contracts\PaymentProcessor;
use App\Services\Stripe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class PaymentProcessorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentProcessor::class, function (Application $app) {
            return $app->make(Stripe::class, [
                'config' => [1, 2, 3],
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
