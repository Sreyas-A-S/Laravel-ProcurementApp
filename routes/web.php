<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrderController;


Route::get('/', [IndexController::class, 'index']);


Route::resource('suppliers', SupplierController::class);

Route::resource('items', ItemsController::class);

Route::resource('orders', OrderController::class);

Route::get('/get-items/{supplierId}', [ItemsController::class, 'getItems']);

Route::get('/get-item-details/{itemId}', [ItemsController::class, 'getItemDetails']);

