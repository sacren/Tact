<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentProcessor;
use App\Services\Stripe;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController
{
    public function __construct(
        private readonly TransactionService $transactionService,
        private readonly PaymentProcessor $paymentProcessor)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stripe = app()[Stripe::class];
        dump($stripe);

        $repo = '<a href="https://github.com/sacren">My Github</a>';

        return view('transactions.index', compact('request', 'repo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Create for Transactions Page: ' . route('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        ]);

        return 'Transaction Created';
    }

    /**
     * Display the specified resource.
     */
    public function show(
        string $id,
        TransactionService $transactionService,
        PaymentProcessor $paymentProcessor)
    {
        $transaction = $transactionService->processTransaction($id);
        $paymentProcessor->process($transaction);
        $app = resolve(PaymentProcessor::class);
        dump($app);

        return 'Transaction ID: ' . $id
            . ' URI: ' . route('transactions.show', [ 'transactionId' => $id, ])
            . ' Amount: ' . $transaction['amount'];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'Edit Transaction ID: ' . $id . ' URI: ' . route('transactions.edit', [
            'transactionId' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        ]);

        return 'Update Transaction ID: ' . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'Delete Transaction ID: ' . $id;
    }

    /**
     * Process a file associated with the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $transaction
     * @param  string|null  $file
     */
    public function showFile(Request $request, $transaction, $file = null)
    {
        $request->validate([
        ]);

        return 'Transaction ID: ' . $transaction . ' URI: ' . route('transactions.showfile', [
            'transactionId' => $transaction,
            'fileId' => $file,
        ]);
    }
}
