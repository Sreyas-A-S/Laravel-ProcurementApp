<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index() 
    {
        $items = Items::all();
        $suppliers = Supplier::all();

        return view("items", compact("items", "suppliers"));
    }
    public function store(Request $request) 
    {

        $validatedData = $request->validate([
            'item_name' => 'required',
            'inventory_location' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'supplier_id' => 'required',
            'stock_unit' => 'required',
            'unit_price' => 'required|numeric',
            'item_images.*' => 'image',
            'status' => 'required|in:Enabled,Disabled',
        ]);

        $imagePaths = [];
        if ($request->hasFile('item_images')) {
            foreach ($request->file('item_images') as $image) {

                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('items'), $filename);
                $imagePaths[] = $filename;
            }
        }

        $validatedData['item_images'] = json_encode($imagePaths);

        Items::create($validatedData);

        return redirect()->back()->with('success', 'Item created successfully!');
    }
}
