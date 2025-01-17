<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index']);
