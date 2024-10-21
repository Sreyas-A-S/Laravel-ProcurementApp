
@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')

<div class="overflow-hidden">
		<div class="container">
			<div class="max-w-2xl mx-auto text-center pt-3 pb-2">
				<h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
					Suppliers
				</h2>
				
			</div>
		</div>

		

		<div class="container my-3">
			<div class="row align-items-center align-items-xl-stretch flex-column flex-xl-row">

				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-12 mt-5">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
                        <div class="d-flex justify-content-between ">
                        <h5>Suppliers List</h5>
						<a href="{{ 'dg'}}" class="btn btn-primary mb-5 text-white" >Add Supplier</a>
                        </div>
						
                        <table id="suppliersTable" class="table">
                            <thead>
                                <tr>
                                    <th>Supplier No</th>
                                    <th>Supplier Name</th>
                                    <th>Address</th>
                                    <th>TAX No</th>
                                    <th>Country</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->id }}</td>
                                        <td>{{ $supplier->supplier_name }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ $supplier->tax_no }}</td>
                                        <td>{{ $supplier->country }}</td>
                                        <td>{{ $supplier->mobile_no }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->status }}</td>
                                        <td>
                                            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
        $('#suppliersTable').DataTable(); // Simple initialization
    });
</script>


   
    @endsection