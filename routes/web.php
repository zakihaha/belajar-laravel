<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');

// restaurant
Route::get('/restaurant/show/{restaurant:slug}', [RestaurantController::class, 'show'])->name('restaurant.show');

Route::middleware('auth')->group(function() {
    Route::middleware('CheckRole')->group(function() {
        Route::get('/restaurant/create', [RestaurantController::class, 'create'])->name('restaurant.create');
        Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');
        Route::get('/restaurant/edit/{restaurant:slug}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
        Route::put('/restaurant/update/{restaurant:slug}', [RestaurantController::class, 'update'])->name('restaurant.update');
        Route::delete('/restaurant/destroy/{restaurant:slug}', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
    
        // menu
        Route::get('/menu/create/{restaurant:slug}', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/menu/store/{restaurant:slug}', [MenuController::class, 'store'])->name('menu.store');

        Route::get('/menu/edit/{menu:id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::post('/menu/update/{menu:id}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/menu/destroy/{menu:id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });

    // cart
    Route::get('/cart', [BuyController::class, 'index'])->name('cart.index');
    Route::post('/cart/add-to-cart/{menu:id}', [BuyController::class, 'addToCart'])->name('addToCart');
    Route::put('cart/update/{cart:id}', [BuyController::class, 'update'])->name('cart.update');

    Route::get('/cart/checkout', [BuyController::class, 'checkout'])->name('cart.checkout');

    // inovice
    Route::post('/create-inovice', [BuyController::class, 'createInvoice'])->name('create.invoice');
    Route::get('/invoice', [BuyController::class, 'invoice'])->name('invoice');
});
