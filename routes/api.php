<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    Route::post('/save', [OrderController::class, 'save'])->name('save');
    Route::any('/pasiens', [OrderController::class, 'getPaginatedPasiens'])->name('pasiens');
    Route::any('/orders', [OrderController::class, 'getPaginatedOrders'])->name('orders');
    Route::get('/order/{no_order}', [OrderController::class, 'getOrderByNoOrder'])->name('order.by.no.order');
    Route::get('/pasien/{no_rekam}', [OrderController::class, 'getPasienByNoRekam'])->name('pasien.by.no.rekam');
});

