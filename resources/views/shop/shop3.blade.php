<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
    <title>Profile user</title>
</head>
<header>
    <div class="navbar" style="height: 200px">
            <div class="nav">
                <a class="logo">
                    <img src="{{ asset('photo/logo.png') }}" alt="" width="400px">
                </a>
                    <div class="col" style="padding-top: 5%;">
                        <a href="/index" class="text" style="font-size: 23px">Home</a>
                        <a href="#" class="text2" style="font-size: 23px">Concert</a>
                        <a href="#" class="text3" style="font-size: 23px">About Us</a>
                        <a href="#" class="text4" style="font-size: 23px">Contact</a>
                    </div><a href="/confirm" class="check">เช็คข้อมูลการจอง</a>
            </div>
</header>
<body>

     <div class="mainscreen">
    <!-- <img src="https://image.freepik.com/free-vector/purple-background-with-neon-frame_52683-34124.jpg"  class="bgimg " alt="">-->
      <div class="card">
        {{-- พื้นในรูปรองเท้า --}}
        <div class="leftside"  >
          <img
            src="{{ asset('photo/event4.png') }}"
            class="product"
            alt=""
          />
        </div>
        {{-- พื้นหลังที่กรอก --}}
        <div class="rightside" >
          <form action="{{ route('order.order') }}" method="POST" enctype="multipart/form-data">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                @csrf
                    <h1>Jak Concert</h1>
                    <h2>กรอกรายละเอียดการจองบัตร</h2><div class="price">
                    <p>Concert Name</p>
                        <input type="text" class="inputbox" name="concertname"  />
                    <p>User Name</p>
                    <div class="">
                        <input type="text" name="name" class="inputbox" placeholder="" required>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                            </div>
                        {{-- <input type="text" class="inputbox" name="username"  required /> id="card_number" --}}
                    <p>Email</p>
                    <div class="">
                            <input type="text" name="email" class="inputbox" placeholder="">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        {{-- <input type="email" class="inputbox" name="email"  required /> id="card_number" --}}
                    <p>Zone</p>
                        <select class="inputbox1" name="ZONE" id="ZONE" required>
                            <option value="">เลือกโซนที่นั่ง</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                             <span class="text-danger">
                                    @error('ZONE')
                                        {{ $message }}
                                    @enderror
                                </span>
                        </select>
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
                    <p>ราคา</p>
                        <input type="text" class="inputbox" name="price"  required />
                         <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
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
                    <button type="submit" class="button1" >ยืนยันการจอง</button>
                </form>
            </form>
            <div class="text-center">
                <h4 style="font-size: 15px;">*จำกัดสิทธิ์ละ1ใบ</h4></div>
        </div>
        </div><div class="bill">
        <img src="{{ asset('photo/map2.png') }}" alt="" width="400px">
        </div>
        </div>

      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
<footer>
    <div class="foot-body">
    <ul class="footer">
        <h3 class="text-main">Contact</h3>
        <div class="menu" >
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
        <img src="{{ asset('photo/384570185_1256346155028082_8847434753727363923_n-removebg-preview.png') }}" alt="" width="200px">
    </div>
    </div>
</footer>
<script>
    const zonePrices = {
    'A': 2500,
    'B': 2500,
    'C': 1500,
    'D': 1800,
    'E': 1800,
};

function calculateTotalPrice() {
    const selectedZone = document.getElementById('ZONE').value;
    const selectedCount = parseInt(document.getElementById('count').value);

    if (zonePrices[selectedZone] && selectedCount) {
        const totalPrice = zonePrices[selectedZone] * selectedCount;
        document.querySelector('input[name="price"]').value = totalPrice;
    } else {
        document.querySelector('input[name="price"]').value = "";
    }
}

document.getElementById('ZONE').addEventListener('change', calculateTotalPrice);
document.getElementById('count').addEventListener('change', calculateTotalPrice);
</script>
<script type="text/javascript">
    $('.show_confirm').click(function (event){
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
        .then((willDelete)=>{
            if(willlDelete){
                form.submit();
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>
