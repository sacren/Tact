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

Route::get('/transactions/{tranctionId}/file/{fileId?}', function ($tranctionId, $fileId = null) {
    return 'Transaction ID: ' . $tranctionId . ' with File ID: ' . ($fileId ?? 'No file ID provided');
});

Route::get('/report/{year}/{month?}', function ($year, $month = null) {
    return 'Report for year: ' . $year . ' and month: ' . ($month ?? 'Not provided');
});
