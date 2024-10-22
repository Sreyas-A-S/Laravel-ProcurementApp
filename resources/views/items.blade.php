
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
						<a href="{{ 'dg'}}" class="btn btn-primary mb-5 text-white" >Add Item</a>
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
                                @foreach($items as $item)
                                @php $i=1; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->item_name }}<br><h6 class="text-white" style="font-size: 12px; background: radial-gradient(circle at -0.8% 4.3%, rgb(59, 176, 255) 0%, rgb(76, 222, 250) 83.6%); font-color: white; padding: 5px; margin-top:10px; border-radius: 7px;">{{ $item->status }}</h6></td>
                                        <td>{{ $item->inventory_location }}</td>
                                        <td>{{ $item->brand }} <br> {{ $item->category }}</td>
                                        <td>{{ $item->supplier_no }}</td>
                                        <td>{{ $item->unit_price }} / {{ $item->stock_unit }}  </td>
                                        <td>{{ $item->images }}</td>
                                        
                                        @php $i++; @endphp
                                        <td>
                                        <div class="d-flex justify-content-start p-2">
                                            <!-- Edit Button with margin-right for spacing -->
                                            <a style="margin-right: 10px;" title ="edit" href="{{ route('items.edit', $item) }}" class="btn btn-warning mr-2">
                                                <i class="bi bi-pen text-white"></i>
                                            </a>
                                            
                                            <!-- Delete Button with margin-left for spacing -->
                                            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button title ="delete" type="submit" class="btn btn-danger ml-2 text-white"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </div>

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
        $('#ItemsTable').DataTable(); // Simple initialization
    });
</script>


   
    @endsection