<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('places', GoogleController::class);


// Route::get('show', [GoogleController::class, 'show'])->name('show');
// Route::get('auto-complete', [GoogleController::class, 'index'])->name('index');
// Route::post('save-address', [GoogleController::class, 'create'])->name('save-address');


