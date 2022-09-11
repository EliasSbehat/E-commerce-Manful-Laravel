<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

//Site Routes
Route::get('/',[HomeController::class , 'featuredSection'])->name('home');
Route::get('/shop', [HomeController::class , 'listProducts'])->name('shop');
Route::get('/product/{slug}',[HomeController::class,'singleProduct'])->name('product');

// Search and Filter
Route::get('/search', [HomeController::class , 'search'])->name('search');
Route::post('/shop/{id}', [HomeController::class , 'filter'])->name('filter');
Route::get('/shop/{id}', [HomeController::class , 'filter'])->name('filter');

// Shopping cart
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart',[CartController::class , 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::post('clear',[CartController::class , 'clearCart'])->name('cart.clear');

//Order and checkout
Route::middleware('auth')->group(function(){
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout/store', [CheckoutController::class, 'store'])->name('checkout-store');
    Route::view('/confirmation' , 'confirmation');
});

// Admin Routes
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class , 'index'])->name('index');
    Route::resource('/users' , UserController::class);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/products',ProductController::class);
    Route::resource('/orders', OrderController::class);
});

require __DIR__.'/auth.php';
