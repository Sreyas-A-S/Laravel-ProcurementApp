<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Items;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index() {
        $sups = Supplier::count();
        $items = Items::count();
        $po = Order::count();
        $array = [$sups, $items, $po];
        return view("index", compact("array"));
    }
}
