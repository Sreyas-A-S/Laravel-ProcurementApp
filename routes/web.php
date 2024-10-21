<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('index');
});


Route::get('/items', function () {
    return view('items');
});

Route::get('/orders', function () {
    return view('orders');
});

Route::resource('suppliers', SupplierController::class);
