<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('article', ArticleController::class);

Route::resource('/categories', CategoryCOntroller::class)->only([
    'index', 'store', 'update', 'destroy'
]);
