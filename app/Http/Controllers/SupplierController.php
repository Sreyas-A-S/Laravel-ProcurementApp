<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Items;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function index() {

        $suppliers = Supplier::all();
        return view("suppliers", compact("suppliers"));
    }

    public function store(Request $request) {
       
        $validatedData = $request->validate([
            "supplier_name"=>'required',
            'address'=> 'required',
            'tax_no'=>'required',
            'country' => 'required',
            'mobile_no' =>'required',
            'email' => 'required|email',
            'status'=> 'required|in:Active,Inactive,Blocked'
        ]);
        Supplier::create($validatedData);
        return redirect()->route('suppliers.index')->with('success','Supplier Added Succesfully!');
}
        
}