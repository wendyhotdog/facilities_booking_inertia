<?php

use App\Http\Controllers\AdminFacilityController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['middleware' => 'role:admin|super-admin'])->prefix('admin')->group(function () {
    Route::middleware('auth')->name('admin.')->group(function () {
        // Users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        // Facilities
        Route::get('/facilities', [AdminFacilityController::class, 'index'])->name('facilities.index');
        Route::get('/facilities/create', [AdminFacilityController::class, 'create'])->name('facilities.create');
        Route::post('/facilities/store', [AdminFacilityController::class, 'store'])->name('facilities.store');
        Route::get('/facilities/show/{id}', [AdminFacilityController::class, 'show'])->name('facilities.show');
        Route::post('/facilities/update/{id}', [AdminFacilityController::class, 'update'])->name('facilities.update');

        // Reservations
        Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
        Route::get('/reservations/{id}', [AdminReservationController::class, 'show'])->name('reservations.show');
        Route::post('/payment/approve/{id}', [AdminReservationController::class, 'approve'])->name('payment.approve');
    });
});
