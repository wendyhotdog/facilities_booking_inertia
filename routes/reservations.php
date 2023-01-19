<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::post('reservations/cancel/{id}', [ReservationController::class, 'cancel'])->name('reservations.cancel');
