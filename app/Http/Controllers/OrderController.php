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
            'order_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'item_total' => 'required|numeric',
            'discount' => 'required|numeric',
            'net_amount' => 'required|numeric',
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.item_name' => 'required|string',
            'items.*.stock_unit' => 'required|string',
            'items.*.unit_price' => 'required|numeric',
            'items.*.packing_unit' => 'required|string',
            'items.*.order_qty' => 'required|numeric|min:1',
            'items.*.discount' => 'nullable|numeric|min:0',
        ]);
        
        $validatedData['items'] = json_encode($validatedData['items']);
    

        Order::create([
            'order_date' => $validatedData['order_date'],
            'supplier_id' => $validatedData['supplier_id'],
            'item_total' => $validatedData['item_total'],
            'discount' => $validatedData['discount'],
            'net_amount' => $validatedData['net_amount'],
            'items' => $validatedData['items'], 
        ]);
        
        return redirect()->route('orders.index')->with('success', 'Purchase order created successfully!');
    }
    
        public function destroy($id)
            {
                $order = Order::findOrFail($id);

                $order->delete();

                return redirect()->route('orders.index')->with('success', 'Item and associated images deleted successfully!');
            }


        public function exportExcel($id)
                    {
                        $order = Order::findOrFail($id);
                        $fileName = 'order_' . $id . '.csv';
                        $headers = array(
                            "Content-type"        => "text/csv",
                            "Content-Disposition" => "attachment; filename=$fileName",
                            
                        );

                        $columns = ['Order Date', 'Supplier Name', 'Item Total', 'Discount', 'Net Amount'];

                        $callback = function() use($order, $columns) {
                            $file = fopen('php://output', 'w');
                            fputcsv($file, $columns);

                            $row = [
                                $order->order_date,
                                $order->supplier->supplier_name,
                                $order->item_total,
                                $order->discount,
                                $order->net_amount
                            ];

                            fputcsv($file, $row);
                            fclose($file);
                        };

                        return response()->stream($callback, 200, $headers);
                    }

                    public function exportPDF($id)
{
                        $order = Order::findOrFail($id);
                        return view('orders.print', compact('order'));
                    }


    

}