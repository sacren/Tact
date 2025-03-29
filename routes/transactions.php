<?php

use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::controller(TransactionController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{transactionId}', 'show')->name('show');
    Route::get('/{transactionId}/edit', 'edit')->name('edit');
    Route::patch('/{transactionId}', 'update')->name('update');
    Route::delete('/{transactionId}', 'destroy')->name('destroy');

    Route::get('/{transactionId}/files/{fileId?}', 'showFile')->name('showfile');
});

Route::get('/{transactionId}/process', ProcessController::class)->name('process');
