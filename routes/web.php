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
use App\Http\Controllers\UserAccountController;

//Site Routes
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'featuredSection')->name('home');
    Route::get('/shop', 'listProducts')->name('shop');
    Route::get('/product/{slug}','singleProduct')->name('product');
    // Search and Filter
    Route::get('/search', 'search')->name('search');
    Route::post('/shop/{id}', 'filter')->name('filter');
    Route::get('/shop/{id}', 'filter')->name('filter');
});

// Shopping cart
Route::controller(CartController::class)->group(function(){
    Route::get('cart', 'cartList')->name('cart.list');
    Route::post('cart','addToCart')->name('cart.store');
    Route::post('update-cart' ,'updateCart')->name('cart.update');
    Route::post('remove','removeCartItem')->name('cart.remove');
    Route::post('clear', 'clearCart')->name('cart.clear');
});

// User account and order history
Route::controller(UserAccountController::class)->middleware('auth')->group(function(){
    Route::get('/myaccount' , 'account')->name('account');
    Route::get('/myaccount/edit/{id}', 'editProfile')->name('edit-profile');
    Route::get('/myaccount/password/{id}', 'editPassword')->name('edit-password');
    Route::post('/myaccount/updateprofile','updateProfile')->name('update-profile');
    Route::post('/myaccount/updatepassword','updatePassword')->name('update-password');
    Route::get('/myorders' , 'orders')->name('orders');
    Route::get('/myorders/{order_no}' , 'singleOrder')->name('single-order');
    Route::post('/myorders/cancel', 'cancelOrder')->name('cancel-order');
});


//Checkout
Route::middleware('auth')->group(function(){
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout/store', [CheckoutController::class, 'store'])->name('checkout-store');
    Route::view('/confirmation' , 'confirmation')->name('confirmation');
});

// Admin Routes
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class , 'index'])->name('index');
    Route::resource('/users' , UserController::class);
    Route::post('/users/{id}' , [UserController::class , 'restore'])->name('users.restore');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/products',ProductController::class);
    Route::resource('/orders', OrderController::class);
    Route::post('/orders/search', [OrderController::class , 'search'])->name('orders.search');
});

require __DIR__.'/auth.php';
