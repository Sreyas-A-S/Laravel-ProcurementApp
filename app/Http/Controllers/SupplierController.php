<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function index() {

        $suppliers = Supplier::all();
        return view("suppliers", compact("suppliers"));
    }
}
