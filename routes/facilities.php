<?php

use App\Http\Controllers\FacilityController;
use Illuminate\Support\Facades\Route;


Route::get('facilities', [FacilityController::class, 'index'])->name('facilities.index');
Route::get('facilities/create', [FacilityController::class, 'create'])->name('facilities.create')->middleware(['middleware' => 'permission:add-facility']);
Route::post('facilities', [FacilityController::class, 'store'])->name('facilities.store')->middleware(['middleware' => 'permission:add-facility']);
Route::get('facilities/{facility}', [FacilityController::class, 'show'])->name('facilities.show');
Route::get('facilities/{id}/edit', [FacilityController::class, 'edit'])->name('facilities.edit');
Route::post('facilities/{id}', [FacilityController::class, 'update'])->name('facilities.update');
Route::delete('facilities/{id}', [FacilityController::class, 'destroy'])->name('facilities.destroy');
