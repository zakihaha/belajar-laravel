<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');

// restaurant
Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');

Route::get('/restaurant/show/{restaurant:slug}', [RestaurantController::class, 'show'])->name('restaurant.show');

Route::get('/restaurant/edit/{restaurant:slug}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
Route::put('/restaurant/update/{restaurant:slug}', [RestaurantController::class, 'update'])->name('restaurant.update');

Route::delete('/restaurant/destroy/{restaurant:slug}', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');

// menu
Route::get('/menu/create/{restaurant:slug}', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu/store/{restaurant:slug}', [MenuController::class, 'store'])->name('menu.store');

Route::get('/menu/edit/{menu:id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::post('/menu/update/{menu:id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/destroy/{menu:id}', [MenuController::class, 'destroy'])->name('menu.destroy');

// cart
Route::get('cart', [BuyController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [BuyController::class, 'addToCart'])->name('addToCart');

// checkout
Route::get('checkout', [BuyController::class, 'checkout'])->name('cart.checkout');

// inovice
Route::post('/create-inovice', [BuyController::class, 'createInvoice'])->name('cart.create.invoice');
Route::get('invoice', [BuyController::class, 'invoice'])->name('cart.invoice');