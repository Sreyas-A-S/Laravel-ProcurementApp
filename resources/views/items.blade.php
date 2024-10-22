
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
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"> Add New Item </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                                                            
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
                                    
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                @php $i=1; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->item_name }}<br><h6 class="text-white" style="font-size: 12px; background: radial-gradient(circle at -0.8% 4.3%, rgb(59, 176, 255) 0%, rgb(76, 222, 250) 83.6%); font-color: white; padding: 5px; margin-top:10px; border-radius: 7px;">{{ $item->status }}</h6></td>
                                        <td>{{ $item->inventory_location }}</td>
                                        <td>{{ $item->brand }} <br> {{ $item->category }}</td>
                                        <td>{{ $item->supplier_no }}</td>
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
                                                    @if(!empty($item->item_images))
                                                        
                                                        @foreach(json_decode($item->item_images) as $image)
                                                            
                                                                <img style="padding: 5px;" src="{{ asset('items_img/' . $image) }}" alt="Item Image" class="img-fluid">
                                                           
                                                        @endforeach
                                                        
                                                    @else
                                                        <p>No images available for this item.</p>
                                                    @endif
                                                                                            
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