<!-- resources/views/concert_detail.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Concert Detail</title>
</head>
<body>
    <h1>{{ $concert->concertname }}</h1>
    <p><strong>Artist:</strong> {{ $concert->artist }}</p>
    <p><strong>Map Zone:</strong> {{ $concert->mapzone }}</p>
    <p><strong>Rate Price:</strong> {{ $concert->rateprice }} บาท</p>
    <p><strong>Detail:</strong> {{ $concert->detail }}</p>
    <div>
        <strong>Image:</strong> <br>
        <img src="{{ url('images/' . $concert->imagecon) }}" alt="Concert Image" style="width:200px;">
    </div>
</body>
</html>
