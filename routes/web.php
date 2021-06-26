<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/


Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::post('/contact', [ContactController::class, 'contact'])->name('submit');
Route::post('/reservation', [HomeController::class, 'reservation'])->name('reservation');
