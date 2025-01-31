<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/categories', CategoryCOntroller::class)->only([
    'index', 'store', 'update', 'destroy'
]);
