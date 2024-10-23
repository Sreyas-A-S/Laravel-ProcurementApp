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
            'tax_no'=>'required|numeric',
            'country' => 'required',
            'mobile_no' =>'required|numeric',
            'email' => 'required|email',
            'status'=> 'required|in:Active,Inactive,Blocked'
        ]);
        Supplier::create($validatedData);
        return redirect()->route('suppliers.index')->with('success','Supplier Added Succesfully!');
}

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            "supplier_name"=>'required',
            'address'=> 'required',
            'tax_no'=>'required|numeric',
            'country' => 'required',
            'mobile_no' =>'required|numeric',
            'email' => 'required|email',
            'status'=> 'required|in:Active,Inactive,Blocked'
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($validatedData);

        return redirect()->route('suppliers.index')->with('success','Supplier Updated Successfully');
    }

    public function destroy($id) {
        $supplier= Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success','Supplier Added Succcessfully!');
    }
        
}