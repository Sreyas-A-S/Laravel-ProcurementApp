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
                $image->move(public_path('items_img'), $filename);
                $imagePaths[] = $filename;
            }
        }

        $validatedData['item_images'] = json_encode($imagePaths);

        Items::create($validatedData);
        return redirect()->route('items.index')->with('success', 'Item created successfully!');
    }


            public function update(Request $request, $id)
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

                $item = Items::findOrFail($id);

                $imagePaths = $item->item_images ? json_decode($item->item_images, true) : [];
                if ($request->hasFile('item_images')) {
                    foreach ($request->file('item_images') as $image) {
                        $filename = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path('items'), $filename);
                        $imagePaths[] = $filename;
                    }
                }

                $validatedData['item_images'] = json_encode($imagePaths);

                $item->update($validatedData);

                return redirect()->route('items.index')->with('success', 'Item updated successfully!');
            }


            public function destroy($id)
            {
                $item = Items::findOrFail($id);


                if ($item->item_images) {
                    $images = json_decode($item->item_images, true);

                    foreach ($images as $image) {
                        $imagePath = public_path('items') . '/' . $image;
                        if (file_exists($imagePath)) {
                            unlink($imagePath); 
                        }
                    }
                }

                $item->delete();

                return redirect()->route('items.index')->with('success', 'Item and associated images deleted successfully!');
            }

            public function getItems($supplierId)
            {
                $items = Items::where('supplier_id', $supplierId)->get();
                return response()->json($items);
            }
            public function getItemDetails($itemId)
            {
                $item = Items::find($itemId);              
                return response()->json($item);
            }

       
    }
