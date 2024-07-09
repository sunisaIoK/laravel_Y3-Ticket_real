<!-- resources/views/concert_detail.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Concert Detail</title>
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
                    @endforeach
                </tbody>
            </table>
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
