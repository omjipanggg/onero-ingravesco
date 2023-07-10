<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AjaxController as Ajax;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\NgodengController as Ngodeng;
use App\Http\Controllers\ProductController as Product;
use App\Http\Controllers\UserController as User;

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

// AJAX
Route::get('ajax/orders/{category}', [Ajax::class, 'tableOrderByCategories'])->name('ajax.tableOrder');

// HOME
Route::get('/', [Home::class, 'index'])->name('home.index');
Route::post('search', [Home::class, 'search'])->name('home.search');
Route::get('settings', [Home::class, 'settings'])->name('home.settings')->middleware(['auth', 'verified']);
Route::get('send/{email}', [Home::class, 'emailTest'])->name('home.emailTest');

Route::get('preview/image/{directory}/{id}', [Home::class, 'previewImage'])->name('home.previewImage');
Route::get('preview/files/{directory}/{id}', [Home::class, 'previewOnModal'])->name('home.previewOnModal');

// ADMIN
Route::get('dashboard', [Admin::class, 'index'])->name('admin.index');

// USER
Route::get('user', [User::class, 'index'])->name('user.index');
Route::get('user/create', [User::class, 'create'])->name('user.create');
Route::post('user/store', [User::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [User::class, 'edit'])->name('user.edit');
Route::put('user/update/{id}', [User::class, 'update'])->name('user.update');
Route::delete('user/delete/{id}', [User::class, 'destroy'])->name('user.delete');
Route::get('user/{id}', [User::class, 'show'])->name('user.show');

// NGODENG
Route::get('ngodeng', [Home::class, 'ngodengIndex'])->name('home.ngodengIndex');
Route::get('ngodeng/dashboard', [Ngodeng::class, 'index'])->name('ngodeng.index');
Route::get('ngodeng/products', [Ngodeng::class, 'products'])->name('ngodeng.products');
Route::get('ngodeng/sales', [Ngodeng::class, 'sales'])->name('ngodeng.sales');

// NGODENG——SALES
Route::get('ngodeng/sales/create', [Ngodeng::class, 'create'])->name('ngodeng.create');
Route::post('ngodeng/sales/store', [Ngodeng::class, 'store'])->name('ngodeng.store');
Route::get('ngodeng/sales/edit/{id}', [Ngodeng::class, 'edit'])->name('ngodeng.edit');
Route::put('ngodeng/sales/update/{id}', [Ngodeng::class, 'update'])->name('ngodeng.update');
Route::delete('ngodeng/sales/delete/{id}', [Ngodeng::class, 'destroy'])->name('ngodeng.delete');
Route::get('ngodeng/sales/fetch-weekly-order-to-chart', [Ngodeng::class, 'fetchWeeklySales'])->name('ngodeng.fetchWeeklySales');
Route::get('ngodeng/sales/history', [Ngodeng::class, 'salesHistory'])->name('ngodeng.salesHistory');
Route::get('ngodeng/sales/{id}', [Ngodeng::class, 'show'])->name('ngodeng.show');

// PRODUCT
Route::get('product', [Product::class, 'index'])->name('product.index');
Route::get('product/create', [Product::class, 'create'])->name('product.create');
Route::post('product/store', [Product::class, 'store'])->name('product.store');
Route::get('product/edit/{id}', [Product::class, 'edit'])->name('product.edit');
Route::put('product/update/{id}', [Product::class, 'update'])->name('product.update');
Route::delete('product/delete/{id}', [Product::class, 'destroy'])->name('product.delete');