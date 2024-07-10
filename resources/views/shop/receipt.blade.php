<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('css/history.css') }}" rel="stylesheet">
    <title>Receipt</title>
    <style>
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 5%
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            background: linear-gradient(45deg, #000000, #000000, #000000, #000000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

        .items th,
        .items td {
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
    <center>
        <a href="{{ url('history') }}">ย้อนกลับ</a>
    </center>
</body>

</html>
