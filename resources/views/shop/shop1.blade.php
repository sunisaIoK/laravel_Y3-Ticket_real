<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
    <title>Profile user</title>
</head>
<header>
    <div class="navbar" style="height: 200px">
        <div class="nav">
            <div class="col" style="padding-top: 5%;">
                <a href="/index" class="text" style="font-size: 23px">Home</a>
            </div>
</header>

<body>
    <div class="mainscreen">
        <!-- <img src="https://image.freepik.com/free-vector/purple-background-with-neon-frame_52683-34124.jpg"  class="bgimg " alt="">-->
        <div class="card">
            <div class="leftside">
                <img src="{{ url('images/' . $concert->imagecon) }}" alt="Concert Image">
            </div>
            {{-- พื้นหลังที่กรอก --}}
            <div class="rightside">
                <form action="{{ route('order.order') }}" method="POST" enctype="multipart/form-data">
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif
    @csrf
    <h1>{{ $concert->concertname }}</h1>
    <input type="hidden" name="concertname" value="{{ $concert->concertname }}">
    <h3>กรอกรายละเอียดการจองบัตร</h3><br>
    <div class="price">
        <p>User Name</p>
        <div class="">
            <input type="text" name="name" class="inputbox" placeholder="" required>
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <p>Email</p>
        <div class="">
            <input type="text" name="email" class="inputbox" placeholder="">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <p>Zone</p>
        <select class="inputbox1" name="zone_id" id="ZONE" required>
            <option value="">เลือกโซนที่นั่ง</option>
            @foreach ($concert->zones as $zone)
                <option value="{{ $zone->id }}" data-price="{{ $zone->rateprice }}">
                    {{ $zone->zone_name }}
                </option>
            @endforeach
        </select>
        <span class="text-danger">
            @error('zone_id')
                {{ $message }}
            @enderror
        </span>
        <h5 id="price">Price</h5>
        <span class="text-danger">
            @error('price')
                {{ $message }}
            @enderror
        </span><br>
        <p>จำนวน</p>
        <select class="inputbox1" name="count" id="count" required>
            <option value="">เลือกจำนวนบัตร</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <span class="text-danger">
                @error('count')
                    {{ $message }}
                @enderror
            </span>
        </select>
        <p>ราคารวม</p>
        <div class="">
            <input type="text" name="total" id="total" class="inputbox" placeholder="" readonly>
            <span class="text-danger">
                @error('total')
                    {{ $message }}
                @enderror
            </span>
        </div>
    </div>
    <div class="expcvv">
        <p class="expcvv_text">วันที่จอง</p>
        <input type="date" class="inputbox2" name="exp_date" id="exp_date" required />
        <span class="text-danger">
            @error('exp_date')
                {{ $message }}
            @enderror
        </span>
    </div>
    <button type="submit" class="button1">ยืนยันการจอง</button>
</form>

<script>
document.getElementById('ZONE').addEventListener('change', function() {
    updateTotal();
});

document.getElementById('count').addEventListener('change', function() {
    updateTotal();
});

function updateTotal() {
    const zoneSelect = document.getElementById('ZONE');
    const countSelect = document.getElementById('count');
    const priceElement = document.getElementById('price');
    const totalElement = document.getElementById('total');

    const selectedZone = zoneSelect.options[zoneSelect.selectedIndex];
    const price = parseFloat(selectedZone.getAttribute('data-price')) || 0;
    const count = parseInt(countSelect.value) || 0;

    const total = price * count;
    priceElement.textContent = price + ' บาท';
    totalElement.value = total + ' บาท';
}
</script>

                <script>
                    document.getElementById('ZONE').addEventListener('change', function() {
                        const selectedOption = this.options[this.selectedIndex];
                        const price = selectedOption.getAttribute('data-price');
                        document.getElementById('price').textContent = price + ' บาท';
                    });
                </script>
                <script>
                    document.getElementById('ZONE').addEventListener('change', function() {
                        const selectedOption = this.options[this.selectedIndex];
                        const price = selectedOption.getAttribute('data-price');
                        document.getElementById('price').textContent = price + ' บาท';
                    });
                </script>
                <div class="text-center">
                    <h4 style="font-size: 15px;">*จำกัดสิทธิ์ละ2ใบ</h4>
                </div>
            </div>
        </div>
        <div class="bill">
            <img src="{{ asset('photo/map3.png') }}" alt="" width="400px">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
<script>
    function calculateTotalPrice() {
        const zoneSelect = document.getElementById('ZONE');
        const countSelect = document.getElementById('count');
        const priceElement = document.getElementById('price');
        const totalElement = document.getElementById('total');

        const selectedZone = zoneSelect.options[zoneSelect.selectedIndex];
        const price = parseFloat(selectedZone.getAttribute('data-price')) || 0;
        const count = parseInt(countSelect.value) || 0;

        const total = price * count;
        priceElement.textContent = price + ' บาท';
        totalElement.value = total + ' บาท';
    }

    document.getElementById('ZONE').addEventListener('change', calculateTotalPrice);
    document.getElementById('count').addEventListener('change', calculateTotalPrice);
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closet("form");
        var name = $(this).data("name");

        event.preventDeFault();
        swal({
                title: 'Are you sure you want to delete this record?',
                text: "If you delete this, will be gone forever",
                icon: "warning",
                button: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willlDelete) {
                    form.submit();
                }
            });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
