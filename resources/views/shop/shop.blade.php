<!-- resources/views/concert_detail.blade.php -->
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
    <title>History</title>
</head>

<body>
    <!-- ตัวอย่างฟอร์มที่ใช้วิธี POST -->
    <div class="container">
        <h1>Purchase History</h1>
        @if ($purchases->isEmpty())
            <p>No purchases found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Concert Name</th>
                        <th>Email</th>
                        <th>Zone</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Purchase Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->id }}</td>
                            <td>{{ $purchase->concertname }}</td>
                            <td>{{ $purchase->email }}</td>
                            <td>{{ $purchase->zone }}</td>
                            <td>{{ $purchase->count }}</td>
                            <td>{{ $purchase->price }}</td>
                            <td>{{ $purchase->date }}</td>
                            <td>{{ $purchase->created_at }}</td>
                        </tr>
                        <a href="{{ route('receipts.show', ['orderId' => $purchase->id]) }}">View Receipt</a>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url('profileUser') }}">ย้อนกลับ</a>
        @endif
    </div>
</body>
<script>
    // ตัวอย่างการส่งคำขอ POST ด้วย AJAX
    document.getElementById('adminForm').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch('/admin', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    // ข้อมูลที่ต้องการส่ง
                })
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
    });
</script>

</html>
