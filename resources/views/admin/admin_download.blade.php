<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('css/cus.css') }}" rel="stylesheet">
    <title>Profile user</title>
</head>
<body>
    <div class="container" >
        <div class="content" style="background-color: rgb(255, 255, 255);">
            <p class="text-end">
                <div class="content-head">
                    <h1 class="text-head">Data</h1>
                    <p style="font-size: 25px">All</p>
                <div class="content-img">
                    <div class="Profile">
                        <div class="conent-body">
                            <div class="body-box">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>ConcertName</th>
                                                <th>UserName</th>
                                                <th>Email</th>
                                                <th>Zone</th>
                                                <th>Count</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                            </tr>
                                        {{-- วนลูปเอาข้อมูลมาโชว์ --}}
                                            <tbody>
                                                @foreach ($adds as $add)
                                            <tr>
                                                <td>{{ $add->concertname }}</td>
                                                <td>{{ $add->name }}</td>
                                                <td>{{ $add->email }}</td>
                                                <td>{{ $add->zone }}</td>
                                                <td>{{ $add->count }}</td>
                                                <td>{{ $add->price }}</td>
                                                <td>{{ $add->date }}</td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    {{-- <a href="{{ url('profile') }}" class="btn btn-dark">Add data</a> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
<footer>
    <div class="foot-body"></div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>
