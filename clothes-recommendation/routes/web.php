<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');

Route::post('products/filterproducts', [App\Http\Controllers\ProductController::class, 'filterproducts'])->name('filterproducts');

Route::get('products/sortfeatured', [App\Http\Controllers\ProductController::class, 'index'])->name('sortproducts');
Route::get('products/sortlowtohigh', [App\Http\Controllers\ProductController::class, 'sortlowtohigh'])->name('sortlowtohigh');
Route::get('products/sorthightolow', [App\Http\Controllers\ProductController::class, 'sorthightolow'])->name('sorthightolow');