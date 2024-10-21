<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemsController;

Route::get('/', function () {
    return view('index');
});


Route::get('/orders', function () {
    return view('orders');
});

Route::resource('suppliers', SupplierController::class);

Route::resource('items', ItemsController::class);
