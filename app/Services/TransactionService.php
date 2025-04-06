<?php

namespace App\Services;

class TransactionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Process a transaction.
     *
     * @param  int  $id
     * @return array
     */
    public function processTransaction(string $id): array
    {
        return [
            'transactionId' => $id,
            'amount' => 500,
        ];
    }
}
