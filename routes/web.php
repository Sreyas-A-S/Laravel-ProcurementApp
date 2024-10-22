<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemsController;



Route::get('/orders', function () {
    return view('orders');
});

Route::get('/', [IndexController::class, 'index']);


Route::resource('suppliers', SupplierController::class);

Route::resource('items', ItemsController::class);
