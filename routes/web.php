<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\CatalogController::class, 'index'])->name('home');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::post('/order', [\App\Http\Controllers\OrderController::class, 'create'])->name('create.order');

require __DIR__.'/auth.php';
