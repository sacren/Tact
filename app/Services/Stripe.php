<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

class Stripe implements PaymentProcessor
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private array $payment,
        private array $config,
        private SalesTaxCalculator $salesTaxCalculator)
    {
        dump($this->config);
    }

    /**
     * Process payment.
     */
    public function process(array $payment): void
    {
        $this->payment['amount'] = $payment['amount'];
        $this->payment['transactionId'] = $payment['transactionId'];
    }
}
