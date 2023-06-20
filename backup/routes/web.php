<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\NgodengController as Ngodeng;

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
Route::get('/', [Home::class, 'index'])->name('home.index')->middleware(['auth', 'verified']);
Route::post('search', [Home::class, 'search'])->name('home.search');
Route::get('ngodeng', [Home::class, 'ngodengIndex'])->name('home.ngodengIndex');

// ADMIN
Route::get('dashboard', [Admin::class, 'index'])->name('admin.index');

// NGODENG
Route::get('ngodeng/dashboard', [Ngodeng::class, 'index'])->name('ngodeng.index');
Route::get('ngodeng/dashboard/alternate', [Ngodeng::class, 'alternate'])->name('ngodeng.alternate');
Route::get('ngodeng/dashboard/products', [Ngodeng::class, 'products'])->name('ngodeng.products');
Route::get('ngodeng/dashboard/sales', [Ngodeng::class, 'sales'])->name('ngodeng.sales');