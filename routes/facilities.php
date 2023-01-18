<?php

use App\Http\Controllers\FacilityController;
use Illuminate\Support\Facades\Route;


Route::get('facilities', [FacilityController::class, 'index'])->name('facilities.index');
Route::get('facilities/create', [FacilityController::class, 'create'])->name('facilities.create');
Route::post('facilities', [FacilityController::class, 'store'])->name('facilities.store');
Route::get('facilities/{facility}', [FacilityController::class, 'show'])->name('facilities.show');
Route::get('facilities/{facility}/edit', [FacilityController::class, 'edit'])->name('facilities.edit');
Route::put('facilities/{facility}', [FacilityController::class, 'update'])->name('facilities.update');
Route::delete('facilities/{facility}', [FacilityController::class, 'destroy'])->name('facilities.destroy');
