<?php

use Illuminate\Support\Facades\Route;

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
})->where('transactionId', '[1-9][0-9]*')
  ->where('fileId', '[1-9][0-9]*');

Route::get('/report/{year}/{month?}', function ($year, $month = null) {
    return 'Report for year: ' . $year . ' and month: ' . ($month ?? 'Not provided');
})->where([
    'year' => '19[0-9]{2}|20(0[0-9]|1[0-9]|2[0-5])',
    'month' => '0?[1-9]|1[0-2]',
]);
