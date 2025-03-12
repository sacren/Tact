<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/dashboard', function () {
    return 'Welcome to Dashboard';
});

Route::get('/users', function () {
    return [
        'Pythagoras',
        'Geoffrey Chaucer',
        '阿久津',
    ];
});
