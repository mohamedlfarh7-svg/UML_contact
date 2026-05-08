<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParfumController;
use App\Http\Controllers\OrderController; 
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ParfumController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/order/confirm/{parfum}', [OrderController::class, 'confirm'])->name('orders.confirm');
    Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my');

    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/parfums/create', [ParfumController::class, 'create'])->name('parfums.create');
        Route::post('/parfums', [ParfumController::class, 'store'])->name('parfums.store');
        Route::get('/parfums/{parfum}/edit', [ParfumController::class, 'edit'])->name('parfums.edit');
        Route::put('/parfums/{parfum}', [ParfumController::class, 'update'])->name('parfums.update');
        Route::delete('/parfums/{parfum}', [ParfumController::class, 'destroy'])->name('parfums.destroy');

        Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
        Route::post('/admin/orders/{order}/validate', [OrderController::class, 'validateOrder'])->name('orders.validate');
    });
    Route::get('/about', function () {
    return view('about');
    })->name('about');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});

require __DIR__.'/auth.php';