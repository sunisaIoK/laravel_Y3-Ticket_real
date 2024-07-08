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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/css1.css') }}" rel="stylesheet">
    <title>Profile Admin</title>
</head>

<body>

    <!-- Scrollable modal -->
        <a href="{{ url('login') }}" style="color: wheat">Logout</a>
        <div class="content">
            <p class="text-end"><a href="{{ url('Customer') }}" class="btn btn-dark">แสดงข้อมูลลูกค้า</a></p>
            <p class="text-end"><a href="{{ url('createcon') }}" class="btn btn-dark">เพิ่มconcert</a></p>
            <h1 class="text-head">Admin</h1>
            <div class="item">
                <div class="con-item">
                @foreach ($users as $user)
                    <div class="c-item">
                        <h2 style="font-size: 20px">{{ $user->concertname }}</h2>
                        <p>{{ $user->detail }}</p>
                        <span>{{ $user->artist }}</span>
                        <div class="pic" style="background-image: url('{{ url('images/' . $user->imagecon) }}');">
                        </div>
                        <a class="button" href="/shop"></a>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>

    {{-- <a href="{{ url('profile') }}" class="btn btn-dark">Add data</a> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
<footer>
    <div class="foot-body">
        <ul class="footer">
            <h3 class="text-main">Contact</h3>
            <div class="menu">
                <a class="link" style="color: #3b5998;">
                    <i class=" link-icon fa fa-facebook"></i>
                    <span class="link-title">Facebook</span>
                </a>
                <a class="link" style="color: #1e2e77;">
                    <i class=" link-icon fa fa-twitch"></i>
                    <span class="link-title">Twitch</span>
                </a>
                <a class="link" style="color: #00aff0;">
                    <i class=" link-icon fa fa-skype"></i>
                    <span class="link-title">Skype</span>
                </a>
                <a class="link" style="color: #3cf;">
                    <i class=" link-icon fa fa-twitter"></i>
                    <span class="link-title">Twitter</span>
                </a>
                <a class="link" style="color: #dc4a38;">
                    <i class=" link-icon fa fa-google"></i>
                    <span class="link-title">Google</span>
                </a>
            </div>
        </ul>
        <ul class="footer-3">
            <h3 class="text-main">JAK Concert</h3>
            <h4 class="foot-text">บริการ</้>
                <h5 class="foot-text">จำหน่ายตั๋วคอนเสิร์ต</h5>
                <h5 class="foot-text">รับจองตั๋วคอนเสิร์ต</h5>
        </ul>
        <ul class="footer-1">
            <h3 class="text-main">About Us</h3>
            <h4 class="foot-text">JAK Concert</h4>
            <h5 class="foot-text">เป็นบริษัทที่บริการเกี่ยวกับการจองตั๋วคอนเสิร์ตจากทั่วทุกมุมโลก
                พร้อมให้บริการแก่ผู้ที่มีดนตรีในหัวใจ พร้อมสนุกไปด้วยกัน
            </h5>
            {{-- <li class="foot-text">About Us</li>
        <li class="foot-text">Social Medial</li> --}}
        </ul>
        <ul class="footer-2">
            <h3 class="text-main">JAK Concert</h3>
            <h4 class="foot-text">บริการ</h4>
            <h5 class="foot-text">จำหน่ายตั๋วคอนเสิร์ต</h5>
            <h5 class="foot-text">รับจองตั๋วคอนเสิร์ต</h5>
        </ul>
        <div class="foot-img">
            <img src="{{ asset('photo/384570185_1256346155028082_8847434753727363923_n-removebg-preview.png') }}"
                alt="" width="200px">
        </div>
    </div>
</footer>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
