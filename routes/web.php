<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\NgodengController as Ngodeng;
use App\Http\Controllers\ProductController as Product;

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

Route::get('preview/image/{directory}/{id}', [Home::class, 'previewImage'])->name('home.previewImage');
Route::get('preview/files/{directory}/{id}', [Home::class, 'previewOnModal'])->name('home.previewOnModal');

// ADMIN
Route::get('dashboard', [Admin::class, 'index'])->name('admin.index');

// NGODENG
Route::get('ngodeng/dashboard', [Ngodeng::class, 'index'])->name('ngodeng.index');
Route::get('ngodeng/dashboard/products', [Ngodeng::class, 'products'])->name('ngodeng.products');
Route::get('ngodeng/dashboard/sales', [Ngodeng::class, 'sales'])->name('ngodeng.sales');

// PRODUCT——FORM
Route::get('product', [Product::class, 'index'])->name('product.index');
Route::get('product/create', [Product::class, 'create'])->name('product.create');
Route::post('product/store', [Product::class, 'store'])->name('product.store');
Route::get('product/edit/{id}', [Product::class, 'edit'])->name('product.edit');
Route::put('product/update/{id}', [Product::class, 'update'])->name('product.update');
Route::delete('product/delete/{id}', [Product::class, 'destroy'])->name('product.delete');