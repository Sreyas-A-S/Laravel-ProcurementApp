<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Items;
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

        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',  // Ensure supplier exists
            'item_total' => 'required|numeric',               // Total amount of all items
            'discount' => 'required|numeric',                 // Total discount
            'net_amount' => 'required|numeric',               // Final net amount (item_total - discount)
            'items' => 'required|array',                      // Array of items
            'items.*.item_id' => 'required|exists:items,id',  // Ensure each item exists
            'items.*.order_qty' => 'required|numeric|min:1',  // Quantity ordered for each item
            'items.*.discount' => 'nullable|numeric|min:0'    // Discount per item (optional)
        ]);

        $purchaseOrder = Order::create([
            'order_date' => now(),                            // Current date
            'supplier_id' => $validated['supplier_id'],       // Supplier ID
            'item_total' => $validated['item_total'],         // Total item cost
            'discount' => $validated['discount'],             // Total discount
            'net_amount' => $validated['net_amount'],         // Net amount after discount
        ]);

    
        foreach ($validated['items'] as $item) {
            Order::create([
                'purchase_order_id' => $purchaseOrder->id,     // Reference purchase order
                'item_id' => $item['item_id'],                 // Item ID
                'order_qty' => $item['order_qty'],             // Ordered quantity
                'discount' => $item['discount'] ?? 0           // Item-specific discount
            ]);
        }

    return redirect()->route('orders.index')->with('success', 'Purchase Order Added Successfully!');

}

}