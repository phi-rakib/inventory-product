<?php

use Illuminate\Support\Facades\Route;
use PhiRakib\InventoryProduct\Controllers\BrandController;

Route::resource('brands', BrandController::class);