<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $request->validate([
        ]);

        return 'Processed Transaction ID: ' . $id . ' URI: ' . route('transactions.process', [
            'transactionId' => $id,
        ]);
    }
}
