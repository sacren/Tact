<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Transactions Page: ' . route('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Create for Transaction';
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
    public function show(string $id)
    {
        return 'Transaction ID: ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'Edit Transaction ID: ' . $id;
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

        $file = $file ?? 'Not provided';

        return 'Transaction ID: ' . $transaction . ' with File ID: ' . $file;
    }
}
