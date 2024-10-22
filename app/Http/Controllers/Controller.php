<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function index() {
        $array = [];
        return view("index", compact("array"));
    }
}
