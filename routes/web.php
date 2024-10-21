<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('index');
});

Route::get('/suppliers', function () {
    return view('suppliers');
});

Route::get('/items', function () {
    return view('items');
});

Route::get('/orders', function () {
    return view('orders');
});


Route::get('suppliers/data', [SupplierController::class, 'getData'])->name('suppliers.data');
