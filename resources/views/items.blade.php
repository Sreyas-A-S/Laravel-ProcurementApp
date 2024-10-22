
@extends('layouts.app')

@section('title', 'items')

@section('content')

<div class="overflow-hidden">
		<div class="container">
			<div class="max-w-2xl mx-auto text-center pt-3 pb-2">
				<h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
					Items
				</h2>
				
			</div>
		</div>

		

		<div class="container my-3">
			<div class="row align-items-center align-items-xl-stretch flex-column flex-xl-row">

				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-12 mt-5">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
                        <div class="d-flex justify-content-between ">
                        <h5>Items List</h5>
						<a href="{{ 'dg'}}" class="btn btn-primary mb-5 text-white" data-bs-toggle="modal" data-bs-target="#addNew">Add Item</a>
                        
                        <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNew" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label for="item_name" class="form-label">Item Name:</label>
                                                <input type="text" class="form-control" name="item_name" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="inventory_location" class="form-label">Inventory Location:</label>
                                                <input type="text" name="inventory_location" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label for="brand" class="form-label">Brand:</label>
                                                <input type="text" name="brand" class="form-control" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="category" class="form-label">Category:</label>
                                                <input type="text" name="category" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="supplier_id" class="form-label">Supplier:</label>
                                            <select name="supplier_id" class="form-select" required>
                                            @if($suppliers->isEmpty())
                                                <option value="" disabled selected>No suppliers available</option>
                                            @else
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label for="stock_unit" class="form-label">Stock Unit</label>
                                                <select name="stock_unit" class="form-select" required>
                                                    <option selected disabled value="">Select Stock Unit</option>
                                                    <option value="Piece">Piece</option>
                                                    <option value="Kg">Kg</option>
                                                    <option value="Litre">Litre</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="unit_price" class="form-label">Unit Price</label>
                                                <input type="number" class="form-control" name="unit_price" step="0.01" required>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="item_images" class="form-label">Item Images</label>
                                            <input type="file" class="form-control" accept="image/*" name="item_images[]" multiple required>
                                        </div>

                                        <div class="mb-2">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="Enabled">Enabled</option>
                                                <option value="Disabled">Disabled</option>
                                            </select>
                                        </div>
                                        
                                        <div class="text-end mt-3">
                                            <button type="submit" class="btn btn-primary">Add Item</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                                     </div>
						
                        <table id="ItemsTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item </th>
                                    <th>Inventory Location</th>
                                    <th>Brand & Category</th>
                                    <th>Supplier</th>
                                    <th>Stock Price per Unit</th>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                                @foreach($items as $item)
                                
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->item_name }}<br><h6 class="text-white" style="font-size: 12px; background: radial-gradient(circle at -0.8% 4.3%, rgb(59, 176, 255) 0%, rgb(76, 222, 250) 83.6%); font-color: white; padding: 5px; margin-top:10px; border-radius: 7px;">{{ $item->status }}</h6></td>
                                        <td>{{ $item->inventory_location }}</td>
                                        <td>{{ $item->brand }} <br> {{ $item->category }}</td>
                                        <td>{{ $item->supplier->supplier_name  }}</td>
                                        <td>{{ $item->unit_price }} / {{ $item->stock_unit }}  </td>
                                        <td>
                                        <a href="#" class="btn btn-danger mb-5 text-white" data-bs-toggle="modal" data-bs-target="#viewImage{{ $item->id }}">View</a>
                                        </td>

                                        <div class="modal fade" id="viewImage{{ $item->id }}" tabindex="-1" aria-labelledby="viewImageLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">{{ $item->item_name }} Images </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    @if(!empty($item->item_images) && is_array($item->item_images))
                                                        
                                                        @foreach($item->item_images as $image)
                                                            
                                                                <img style="padding: 5px;" src="{{ asset('items_img/' . $image) }}" alt="Item Image" class="img-fluid">
                                                           
                                                        @endforeach
                                                        
                                                    @else
                                                        <p>No images available for this item.</p>
                                                    @endif
                                                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <td>

                                        <a href="#" style="margin-bottom: 5px;" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editItemModal{{ $item->id }}"> Edit</a>
                                        <form method="POST" action="{{ route('items.destroy', $item->id) }}" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this item? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" >
                                                Delete
                                            </button>
                                        </form>

                                        </td>

                                     
                                    
                                        <div class="modal fade" id="editItemModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Item: {{ $item->item_name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       
                                                        <form method="POST" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="item_name" class="form-label">Item Name:</label>
                                                                    <input type="text" class="form-control" name="item_name" value="{{ $item->item_name }}" required>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="inventory_location" class="form-label">Inventory Location:</label>
                                                                    <input type="text" name="inventory_location" class="form-control" value="{{ $item->inventory_location }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="brand" class="form-label">Brand:</label>
                                                                    <input type="text" name="brand" class="form-control" value="{{ $item->brand }}" required>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="category" class="form-label">Category:</label>
                                                                    <input type="text" name="category" class="form-control" value="{{ $item->category }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="supplier_id" class="form-label">Supplier:</label>
                                                                    <select name="supplier_id" class="form-select" required>
                                                                        @foreach($suppliers as $supplier)
                                                                            <option value="{{ $supplier->id }}" {{ $supplier->id == $item->supplier_id ? 'selected' : '' }}>
                                                                                {{ $supplier->supplier_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="stock_unit" class="form-label">Stock Unit</label>
                                                                    <select name="stock_unit" class="form-select" required>
                                                                        <option value="Piece" {{ $item->stock_unit == 'Piece' ? 'selected' : '' }}>Piece</option>
                                                                        <option value="Kg" {{ $item->stock_unit == 'Kg' ? 'selected' : '' }}>Kg</option>
                                                                        <option value="Litre" {{ $item->stock_unit == 'Litre' ? 'selected' : '' }}>Litre</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="unit_price" class="form-label">Unit Price</label>
                                                                    <input type="number" class="form-control" name="unit_price" value="{{ $item->unit_price }}" step="0.01" required>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="item_images" class="form-label">Item Images</label>
                                                                    <input type="file" class="form-control" name="item_images[]" multiple>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select name="status" class="form-select">
                                                                        <option value="Enabled" {{ $item->status == 'Enabled' ? 'selected' : '' }}>Enabled</option>
                                                                        <option value="Disabled" {{ $item->status == 'Disabled' ? 'selected' : '' }}>Disabled</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Save changes</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        @php $i++; @endphp
                                        

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


					</div>
				</div>

				

				
			</div>
		</div>
	</div>

    <script>
    $(document).ready(function() {
        $('#ItemsTable').DataTable(); 
    });
</script>


   
    @endsection