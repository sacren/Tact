<?php

use App\Enums\FiledBy;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TransactionController;
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

Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/create', [TransactionController::class, 'create']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::get('/transactions/{transactionId}', [TransactionController::class, 'show']);
Route::get('/transactions/{transactionId}/edit', [TransactionController::class, 'edit']);
Route::patch('/transactions/{transactionId}', [TransactionController::class, 'update']);
Route::delete('/transactions/{transactionId}', [TransactionController::class, 'destroy']);

Route::get('/transactions/{transactionId}/process', ProcessController::class);

Route::get('/transactions/{transactionId}/files/{fileId?}', function ($transactionId, $fileId = null) {
    $fileId = $fileId ?? 'Not provided';

    return 'Transaction ID: ' . $transactionId . ' with File ID: ' . $fileId;
});

Route::get('/report/{year}/{month?}', function ($year, $month = null) {
    $month = $month ?? 'Not provided';

    return 'Report for year: ' . $year . ' and month: ' . $month;
});

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
});

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
})->whereNumber([
    'productionId',
]);

Route::get('/tax/{filedBy}', function (FiledBy $filedBy) {
    return 'Tax filed by: ' . $filedBy->value;
});
