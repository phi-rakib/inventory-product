<?php

use Illuminate\Support\Facades\Route;
use PhiRakib\InventoryProduct\Controllers\BrandController;
use PhiRakib\InventoryProduct\Controllers\CategoryController;

Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('brands/{id}', [BrandController::class, 'show'])->name('brands.show');
Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
Route::put('brands/{id}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');