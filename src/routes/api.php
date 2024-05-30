<?php

use Illuminate\Support\Facades\Route;
use PhiRakib\InventoryProduct\Controllers\BrandController;

Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('brands/{id}', [BrandController::class, 'show'])->name('brands.show');
Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
Route::put('brands/{id}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');