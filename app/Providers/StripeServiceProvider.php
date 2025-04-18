<?php

namespace App\Providers;

use App\Services\Stripe;
use App\Services\SalesTaxCalculator;
use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Stripe::class, function () {
            return new Stripe(
                payment: [
                    'amount' => 255,
                    'transactionId' => 1024,
                ],
                config: [7, 8, 9],
                salesTaxCalculator: new SalesTaxCalculator()
            );
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
