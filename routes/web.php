<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin
    Route::middleware('admin')->group(function() {
        Route::get('/admin/dashboard', [ProductController::class, 'admin_dashboard'] )->name('admin.dashboard');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product-edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    
    // product
    Route::get('/product-details/{product}', [ProductController::class, 'show'])->name('product.show');

    // cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/carts', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/carts/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete('/carts', [CartController::class, 'destroyAll'])->name('cart.destroyAll');

});

require __DIR__.'/auth.php';
