
@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')

<div class="overflow-hidden">
		<div class="container">
			<div class="max-w-2xl mx-auto text-center pt-3 pb-2">
				<h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
					Purchase Order
				</h2>
				
			</div>
		</div>

		

		<div class="container my-3">
			<div class="row align-items-center align-items-xl-stretch flex-column flex-xl-row">

				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-12 mt-5">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
                        <div class="d-flex justify-content-between ">
                        <h5>Purchase Order List</h5>
						<a href="#" class="btn btn-primary mb-5 text-white"  data-bs-toggle="modal" data-bs-target="#addNew">Order</a>
                        </div>

                        <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNew" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Purchase Supplier</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                

                                </div>
                            </div>
                        </div>
                        </div>
						
                        <table id="suppliersTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Supplier</th>
                                    <th>Item Total</th>
                                    <th>Discount</th>
                                    <th>Net amount</th>
                                    <th>Items</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php $i=1; @endphp
                                
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                @php $i=1; @endphp
                                
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