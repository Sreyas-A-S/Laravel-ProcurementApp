<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\POItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index() {
        $orders = Order::all();
        $suppliers = Supplier::where('status', 'Active')->get();
        return view('orders', compact('orders','suppliers'));
    }
    
    public function store(Request $request) {
        $validatedData = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'order_date' => 'required|date',
            'item_total' => 'required|numeric',
            'discount' => 'required|numeric',
            'net_amount' => 'required|numeric',
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.order_qty' => 'required|numeric|min:1',
            'items.*.discount' => 'nullable|numeric|min:0'
        ]);
    
        // Encode items to JSON and include in validated data
        $validatedData['items'] = json_encode($validatedData['items']);
    
        // Create the order using the validated data
        Order::create($validatedData);
        
        return redirect()->route('orders.index')->with('success', 'Purchase order created successfully!');
    }
    

}