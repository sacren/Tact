<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return 'Welcome to Dashboard';
});

Route::get('/users', function () {
    return [
        'Pythagoras',
        'Geoffrey Chaucer',
        '阿久津',
    ];
});

Route::get('/tact', function () {
    return redirect('/dashboard');
});

Route::redirect('/home', '/');

Route::get('/transactions/{transactionId}/files/{fileId?}', function (int $transactionId, int $fileId = null) {
    return 'Transaction ID: ' . $transactionId . ' with File ID: ' . ($fileId ?? 'No file ID provided');
})->where([
    'transactionId' => '[1-9][0-9]*',
    'fileId' => '[1-9][0-9]*',
]);

Route::get('/report/{year}/{month?}', function ($year, $month = null) {
    return 'Report for year: ' . $year . ' and month: ' . ($month ?? 'Not provided');
})->where([
    'year' => '19[0-9]{2}|20(0[0-9]|1[0-9]|2[0-5])',
    'month' => '0?[1-9]|1[0-2]',
]);

Route::get('/budget/{budgetId}', function (Request $request, int $budgetId) {
    try {
        $validated = $request->validate([
            'year' => ['nullable', 'regex:/^(19[0-9]{2}|20(0[0-9]|1[0-9]|2[0-5]))$/'],
            'month' => ['nullable', 'regex:/^(0?[1-9]|1[0-2])$/'],
        ]);
    } catch (ValidationException $exception) {
        return $exception->errors();
    }

    $year = $validated['year'] ?? 'Not provided';
    $month = $validated['month'] ?? 'Not provided';

    return 'Budget ID: ' . $budgetId . ' for year: ' . $year . ' and month: ' . $month;
})->where([
    'budgetId' => '[1-9][0-9]*',
]);

Route::get('/production/{productionId}', function (Request $request, int $productionId) {
    try {
        $validated = $request->validate([
            'year' => 'integer|between:1995,2025',
            'month' => 'integer|between:1,12',
        ]);
    } catch (ValidationException $exception) {
        return $exception->errors();
    }

    $year = $validated['year'] ?? 'Not provided';
    $month = $validated['month'] ?? 'Not provided';

    return 'Production ID: ' . $productionId . ' for year: ' . $year . ' and month: ' . $month;
})->where([
    'productionId' => '[1-9][0-9]*',
]);
