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
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--boxicons link-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!--google font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Rubik+Puddles&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baskervville+SC&family=Sixtyfour:SCAN@-14&family=Unbounded:wght@200..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ga+Maamli&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Ga+Maamli&display=swap" rel="stylesheet">
    <title>Profile user</title>
</head>
<header>
    <div class="navbar" style="height: 200px">
        <div class="nav">
            <a href="#" class="logo ">Jak Ticket</a>
            <div class="path" style="padding-top: 5%;">
                <a href="/index" class="text" style="font-size: 30px">Home</a>
                <a href="#" class="text2" style="font-size: 26px">Concert</a>
                <a href="#" class="text3" style="font-size: 26px">About Us</a>
                <a href="#" class="text4" style="font-size: 26px">Contact</a>
                @foreach ($profiles as $profile)

                    <img src="{{ url('image/' . $profile->profileimage) }}" alt="" class="img-item1"
                        style="width: 50px;margin-top:1px;" class="name">
                @endforeach
                <div class="name-img">
                    <a href="/profileUser/" class="n-t" style="text-decoration: none;">
                        {{-- <img class="text1" src="/images/{{ $profile->profileimage }}"style="max-width:100px; " > --}}
                        <p style=" margin-left:50px; margin-top: 10px; color:rgb(0, 0, 0);">{{ session('loginId') }}</p>
                    </a>
                    @foreach ($profiles as $profile)@endforeach
                </div>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="text-slide" style="text-align: center">
        <h1>Enjoy your time here</h1>
        <h3>รับจองบัตรคอนเสิร์ตจากทั่วทุกมุมโลกา</h3>
    </div>
    <div class="container">
        <div class="item">
            <h1>MUSIC SALE NOW</h1>
            <div class="con-item">
                @foreach ($profiles as $concert)
                    <div class="c-item">
                        <h2 style="font-size: 20px">{{ $concert->concertname }}</h2>
                        <p>{{ $concert->detail }}</p>
                        <span>{{ $concert->artist }}</span>
                        <div class="pic" style="background-image: url('{{ url('images/' . $concert->imagecon) }}');">
                        </div>
                        <a class="button" href="{{ route('buyTicket', ['id' => $concert->id]) }}">Buy Ticket</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
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
{{-- popupshop --}}
{{-- <script>
    // คลิกที่ปุ่มเพื่อเปิดป๊อบอัพ
    document.getElementById("openPurchasePopupButton").addEventListener("click", function() {
        // เลือกป๊อบอัพการซื้อโดยใช้ ID
        var purchaseModal = document.getElementById("purchaseModal");
        // เปิดป๊อบอัพ
        purchaseModal.style.display = "block";
    });

    // ปิดป๊อบอัพการซื้อ
    document.querySelector("#purchaseModal .close").addEventListener("click", function() {
        var purchaseModal = document.getElementById("purchaseModal");
        purchaseModal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        var purchaseModal = document.getElementById("purchaseModal");
        if (event.target == purchaseModal) {
            purchaseModal.style.display = "none";
        }
    });
</script> --}}

{{-- <script>
    document.getElementById("openModalButton").addEventListener("click", function() {
        // เลือกป๊อบอัพโดยใช้ ID
        var modal = document.getElementById("myModal");

        // เปิดป๊อบอัพ
        modal.style.display = "block";
    });
</script>
<script>
    document.querySelector(".close").addEventListener("click", function() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
</script> --}}
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
