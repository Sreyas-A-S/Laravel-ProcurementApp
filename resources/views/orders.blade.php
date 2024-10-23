
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

                        <!-- Purchase Order Modal -->
                            <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="purchaseOrderModalLabel">Create Purchase Order</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('orders.store') }}" id="purchaseOrderForm">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label for="order_date" class="form-label">Order Date:</label>
                                                        <input type="date" class="form-control" name="order_date" value="{{ date('Y-m-d') }}" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="supplierSelect" class="form-label">Supplier Name:</label>
                                                        <select id="supplierSelect" name="supplier_id" class="form-select" required>
                                                            <option value="" disabled selected>Select a supplier</option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="itemSelect" class="form-label">Select Items <text style="font-size:.8em; opacity: 80%;">( Long press on Ctrl(Windows)/Command(Mac) + select )</text>:</label>
                                                    <select id="itemSelect" name="itemSelect[]" class="form-select" multiple disabled required>
                                                        <!-- Items will be populated here via AJAX -->
                                                    </select>
                                                </div>

                                                <h6>Items:</h6>
                                                <table class="table" id="itemTable" style="display: none;">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No</th>
                                                            <th>Item Name</th>
                                                            <th>Stock Unit</th>
                                                            <th>Unit Price</th>
                                                            <th>Packing Unit</th>
                                                            <th>Order Qty</th>
                                                            <th>Item Amount</th>
                                                            <th>Discount</th>
                                                            <th>Net Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemList">
                                                        <!-- Dynamic Item Rows will be appended here -->
                                                    </tbody>
                                                </table>

                                                <div class="row mb-3">
                                                    <div class="col-4">
                                                        <label for="item_total" class="form-label">Item Total:</label>
                                                        <input type="text" class="form-control" name="item_total" id="item_total" readonly>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="discount" class="form-label">Discount:</label>
                                                        <input type="text" class="form-control" name="discount" id="discount" readonly>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="net_amount" class="form-label">Net Amount:</label>
                                                        <input type="text" class="form-control" name="net_amount" id="net_amount" readonly>
                                                    </div>
                                                </div>

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit Order</button>
                                                </div>
                                            </form>
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
                                  
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php $i=1; @endphp
                                
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->supplier->supplier_name }}</td>
                                    <td>{{ $order->item_total }}</td>
                                    <td>{{ $order->discount }}</td>
                                    <td>{{ $order->net_amount }}</td>
                                   
                                    <td>

                                        <div class="d-flex  align-items-center">
                                        <a href="{{ route('orders.export.csv', $order->id) }}" style="margin-right: 5px;" class="btn btn-success text-white"> <i class="bi bi-file-earmark-spreadsheet-fill"></i></a>
                                        <a href="{{ route('orders.print', $order->id) }}" style="margin-right: 5px;" class="btn btn-warning "> <i class="bi bi-printer"></i></i></a>
                                        <form method="POST" action="{{ route('orders.destroy', $order->id) }}" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this item? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-white" >
                                            <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                        </div>
                                            
                                        </td>
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
    // Initialize DataTable for suppliers
    $('#suppliersTable').DataTable();

    // Handle supplier selection change
    $('#supplierSelect').change(function() {
        var supplierId = $(this).val();
        if (supplierId) {
            $.ajax({
                url: '/get-items/' + supplierId,
                method: 'GET',
                success: function(data) {
                    $('#itemSelect').empty(); // Clear previous items
                    $('#itemSelect').prop('disabled', false); // Enable select
                    if (data.length > 0) {
                        data.forEach(function(item) {
                            $('#itemSelect').append(new Option(item.item_name, item.id));
                        });
                    } else {
                        $('#itemSelect').append(new Option('No items available', '', true, true)).prop('disabled', true);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching items:', error);
                }
            });
        } else {
            $('#itemSelect').empty().prop('disabled', true); // Clear and disable if no supplier is selected
        }
    });

    let itemIndex = 0; // Initialize item index

    $('#itemSelect').change(function() {
        var selectedItems = $(this).val(); // Get all selected items
        $('#itemList').empty(); // Clear previous rows
        $('#itemTable').hide(); // Hide the items table initially

        // Check if items are selected
        if (selectedItems.length > 0) {
            selectedItems.forEach(function(itemId) {
                $.ajax({
                    url: '/get-item-details/' + itemId,
                    method: 'GET',
                    success: function(item) {
                        // Create a new row for the item with incremented index
                        var row = `<tr>
                            <td>${itemIndex + 1}</td> <!-- Item No -->
                            <td>
                                <input type="hidden" class="form-control" name="items[${itemIndex}][item_id]" value="${item.id}">
                                <input type="text" class="form-control" name="items[${itemIndex}][item_name]" value="${item.item_name}" readonly>
                            </td>
                            <td><input type="text" class="form-control" name="items[${itemIndex}][stock_unit]" value="${item.stock_unit}" readonly></td>
                            <td><input type="text" class="form-control" name="items[${itemIndex}][unit_price]" value="${item.unit_price}" readonly></td>
                            <td>
                                <select name="items[${itemIndex}][packing_unit]" class="form-select packing-unit">
                                    <option value="Unit">Unit</option>
                                    <option value="Box">Box</option>
                                </select>
                            </td>
                            <td><input type="number" name="items[${itemIndex}][order_qty]" class="form-control order-qty" value="1" min="1"></td>
                            <td class="item-amount">${item.unit_price}</td> <!-- Item Amount -->
                            <td><input type="number" name="items[${itemIndex}][discount]" class="form-control discount" value="0" min="0"></td>
                            <td class="net-amount">${item.unit_price}</td> <!-- Net Amount -->
                        </tr>`;
                        $('#itemList').append(row);
                        itemIndex++; // Increment item index for the next row
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching item details:', error);
                    },
                    complete: function() {
                        // Call calculateTotals() after all items are added to the table
                        calculateTotals();
                    }
                });
            });
            $('#itemTable').show(); // Show the items table
        } else {
            $('#itemTable').hide(); // Hide if no items selected
        }
    });

    // Event delegation to handle dynamic rows for order quantity and discount input
    $('#itemList').on('input', '.order-qty, .discount', function() {
        calculateTotals();
    });

    function calculateTotals() {
        let totalAmount = 0; // Initialize total amount
        let totalDiscount = 0; // Initialize total discount

        $('#itemList tr').each(function() {
            const qty = parseFloat($(this).find('.order-qty').val()) || 0; // Get quantity
            const unitPrice = parseFloat($(this).find('.item-amount').text()) || 0; // Get unit price
            const discount = parseFloat($(this).find('.discount').val()) || 0; // Get discount

            // Calculate item amount and net amount
            const itemAmount = qty * unitPrice;
            const netAmount = itemAmount - discount;

            // Update the row's net amount
            $(this).find('.net-amount').text(netAmount.toFixed(2));

            // Accumulate totals
            totalAmount += itemAmount;
            totalDiscount += discount;
        });

        // Update the total fields in the form
        $('#item_total').val(totalAmount.toFixed(2));
        $('#discount').val(totalDiscount.toFixed(2));
        $('#net_amount').val((totalAmount - totalDiscount).toFixed(2));
    }
});


</script>

   
    @endsection