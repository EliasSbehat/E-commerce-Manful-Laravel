<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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

Route::get('/',[HomeController::class , 'featuredSection'])->name('home');
Route::get('/shop', [HomeController::class , 'listProducts'])->name('shop');
Route::get('/product/{slug}',[HomeController::class,'singleProduct'])->name('product');


Route::get('/search', [HomeController::class , 'search'])->name('search');
Route::get('filter', [HomeController::class , 'filter'])->name('filter');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart',[CartController::class , 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::post('clear',[CartController::class , 'clearCart'])->name('cart.clear');


// Admin Routes
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class , 'index'])->name('index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/products',ProductController::class);
});

require __DIR__.'/auth.php';
