<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Site</title>

    <!--custome css link-->
     <link href="{{ asset('css/loop.css') }}" rel="stylesheet">
    <!--boxicons link-->
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
</head>
<body>

    <header>
        <a href="#" class="logo">Jak Ticket</a>
        <ul class="navlist">
            <li>
                <a href="/index" class="">เข้า</a>
            </li>
        </ul>

        <div class="bx bx-menu" id="menu-icon"></div>
    </header>

<section class="hero">
    <div class="hero-text">
        <h5>#Welcome to</h5>
        <h4>การบริการจองบัตรตั๋วคอนเสิร์ต</h4>
        <h1>Jak Concert</h1>
        <p>Happy to pay</p>
        <a href="{{ url('login') }}">เข้าสู่ระบบ</a>
        <a href="{{ url('regis') }}" class="singin">
            สมัครสมาชิก
            </a>
    </div>
                    </div>
    <div class="hero-img">
        <img src="{{ asset('photo/ticket.gif')}}">
    </div>
</section>

    <div class="icons">
        <a href="#"><i class='bx bxl-instagram-alt'></i></a>
        <a href="#"><i class='bx bxl-youtube'></i></a>
        <a href="#"><i class='bx bxl-facebook'></i></a>
    </div>







    <!--scrollreveal effect-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--costom js link-->
    <script src="js.js"></script>
</body>
</html>
