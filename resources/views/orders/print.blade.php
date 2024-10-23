<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Order</title>
    <style>
        /* Basic styles for print */
        body {
            font-family: 'Arial, sans-serif';
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        @media print {
            /* Hide the print button during printing */
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <h1>Order Summary</h1>
    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
    <p><strong>Supplier:</strong> {{ $order->supplier->supplier_name }}</p>
    <p><strong>Item Total:</strong> {{ $order->item_total }}</p>
    <p><strong>Discount:</strong> {{ $order->discount }}</p>
    <p><strong>Net Amount:</strong> {{ $order->net_amount }}</p>

    <h3>Items Ordered</h3>
    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Stock Unit</th>
                <th>Unit Price</th>
                <th>Packing Unit</th>
                <th>Order Quantity</th>
                <th>Discount</th>
            </tr>
        </thead>
        <tbody>
            @foreach (json_decode($order->items) as $item)
            <tr>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->stock_unit }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->packing_unit }}</td>
                <td>{{ $item->order_qty }}</td>
                <td>{{ $item->discount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <center>
    <button style="margin:10px; font-color: white; font-size: 16px; font-weight:bold; background: linear-gradient(109.6deg, rgb(104, 183, 249) 31.3%, rgb(176, 248, 200) 100.2%); padding:7px; border: none; border-radius: 7px; margin-top: 30px;" class="no-print" onclick="window.print()">Print</button>
    </center>

</body>
</html>
