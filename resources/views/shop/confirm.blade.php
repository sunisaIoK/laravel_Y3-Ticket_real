<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('css/confirm.css') }}" rel="stylesheet">
    <title></title>
</head>

<body>

     <div class="mainscreen">
    <!-- <img src="https://image.freepik.com/free-vector/purple-background-with-neon-frame_52683-34124.jpg"  class="bgimg " alt="">-->
        <div class="container">
            
            <div class="concert">
                <div class="bo-dy">
            <div class="container-head" >
                <div class="concert-b" >
                    @foreach ($orders as $order)
                    <td>{{ $order->concertname }}</td>
                    @endforeach
                </div>
            </div>
            <div class="container-body" >
                <div class="concert-body">
                    @foreach ($orders as $order)
                    <td>{{ $order->name }}</td>
                @endforeach
                </div>
            </div>
            <div class="container-body" >
                <div class="concert-body">
                    @foreach ($orders as $order)
                    <td>{{ $order->zone }}</td>
                @endforeach
                </div>
            </div>
            <div class="container-body" >
                <div class="concert-body">
                    @foreach ($orders as $order)
                    <td>{{ $order->date }}</td>
                @endforeach
                </div>
            </div>
            </div>
                <div class="jak">
                        JAK CONCERT
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

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




