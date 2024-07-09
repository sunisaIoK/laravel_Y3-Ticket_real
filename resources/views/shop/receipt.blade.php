<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .items {
            width: 100%;
            border-collapse: collapse;
        }
        .items th, .items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .items th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Receipt</h1>
            <p>Order ID: {{ $order->id }}</p>
            <p>Date: {{ $order->created_at->format('Y-m-d') }}</p>
        </div>
        <div class="details">
            <p><strong>Customer:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
        </div>
        <table class="items">
            <thead>
                <tr>
                    <th>Concert Name</th>
                    <th>Zone</th>
                    <th>Count</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->concertname }}</td>
                    <td>{{ $order->zone }}</td>
                    <td>{{ $order->count }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->count * $order->price }}</td>
                </tr>
            </tbody>
        </table>
        <div class="total">
            <p><strong>Total:</strong> {{ $order->count * $order->price }}</p>
        </div>
         <a href="{{ route('receipts.download', ['orderId' => $order->id]) }}">Download Receipt</a>
                                <!-- ลิงก์ไปยังหน้าใบเสร็จ -->
    </div>
</body>
</html>
