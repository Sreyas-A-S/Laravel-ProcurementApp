<?php

use Illuminate\Support\Facades\Route;

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