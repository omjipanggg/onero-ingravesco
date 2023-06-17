<?php

use Illuminate\Support\Facades\Route;

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

// AUTH
Auth::routes(['verify' => true]);

// HOME
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index')->middleware(['auth', 'verified']);
Route::post('search', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
Route::get('ngodeng', [App\Http\Controllers\HomeController::class, 'ngodengIndex'])->name('home.ngodengIndex');

// NGODENG
Route::get('ngodeng/dashboard', [App\Http\Controllers\NgodengController::class, 'index'])->name('ngodeng.index');