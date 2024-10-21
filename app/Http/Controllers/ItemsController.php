<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    //
    public function index() {

        $items = Items::all();
        return view("items", compact("items"));
    }
}
