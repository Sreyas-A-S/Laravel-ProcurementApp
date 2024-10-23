
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
						<a href="#" class="btn btn-primary mb-5 text-white"  data-bs-toggle="modal" data-bs-target="#addNew">Add Supplier</a>
                        </div>

                        <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNew" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="{{ route('suppliers.store') }}">
                                    @csrf

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <label for="supplier_name" class="form-label">Supplier Name:</label>
                                            <input type="text" class="form-control" name="supplier_name" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="tax_no" class="form-label">TAX No:</label>
                                            <input type="text" class="form-control" name="tax_no" required>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <label for="address" class="form-label">Address:</label>
                                            <textarea class="form-control" name="address" rows="2" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <label for="country" class="form-label">Country:</label>
                                            <select name="country" class="form-select" required>
                                                <option selected disabled value="">Select Country</option>
                                                <option value="India">India</option>
                                                <option value="USA">USA</option>
                                                <option value="UK">UK</option>
                                                <!-- Add more countries as needed -->
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="mobile_no" class="form-label">Mobile No:</label>
                                            <input type="tel" class="form-control" name="mobile_no" required>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status:</label>
                                            <select name="status" class="form-select" required>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                                <option value="Blocked">Blocked</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-primary">Add Supplier</button>
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>
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
                                        <div class="d-flex justify-content-start p-2">
                                            <!-- Edit Button with margin-right for spacing -->
                                            <a style="margin-right: 10px;" title ="edit" href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning mr-2">
                                                <i class="bi bi-pen text-white"></i>
                                            </a>
                                            
                                            <!-- Delete Button with margin-left for spacing -->
                                            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline;">
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
        $('#suppliersTable').DataTable(); // Simple initialization
    });
</script>


   
    @endsection