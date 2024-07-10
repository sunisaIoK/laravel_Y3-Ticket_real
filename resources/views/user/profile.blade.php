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
    <link href="{{ asset('css/pouU.css') }}" rel="stylesheet">
    <title>Profile user</title>
</head>
<header>
    <div class="navbar" style="height: 200px">
        <div class="nav">
            <a class="logo">
                <img src="{{ asset('photo/logo.png') }}" alt="" width="400px">
            </a>
            <div class="col" style="padding-top: 5%;">
                <a href="{{ url('index') }}" class="text" style="font-size: 23px">PAGE</a>
                <a href="/profileUser/" class="n-t" style="text-decoration: none;">
                    @foreach ($profiles as $profile)
                        <img src="{{ url('imageUser/' . $profile->profileimage) }}" alt="" class="img-item1"
                            width="50px">
                    @endforeach
                </a>
                @foreach ($profiles as $profile)@endforeach
                <form action="{{ route('logout44', ['id' => $profile->id]) }}" method="post">
                    @csrf
                    <button href="" class="btn-logout">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="container" style="background-color: rgb(255, 255, 255);">
        <div class="content">
            <div class="content-head">
                <h1 class="text-head">Profile</h1>
                <p style="font-size: 25px">View</p>
            </div>
            <div class="content-img">
                <div class="Profile">
                </div>
                @foreach ($profiles as $profile)
                    <img src="{{ url('imageUser/' . $profile->profileimage) }}" alt="" class="img-item1"
                        style="width: 250px">
                @endforeach
                {{-- url('profile') ต้องเปลี่ยน ไปสร้างหน้าสำหรับแก้ไขรูป --}}
                {{-- <td><a href="/edit-profile/{{ $profile->id }}" class="button">แก้ไขรูปโปรไฟล์</a></td> --}}
            </div>
            <div class="conent-body">
                <div class="body-box">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>แก้ไขข้อมูล</th>
                                </tr>
                                {{-- วนลูปเอาข้อมูลมาโชว์ --}}
                                <tbody>
                                    @foreach ($profiles as $profile)
                                        <tr>
                                            <td>{{ $profile->name }}</td>
                                            <td>{{ $profile->email }}</td>
                                            <td class="edit-delete">
                                                <a href="/edit-profile/{{ $profile->id }}"
                                                    class="btn-edit">Edit</a><br>
                                                <form action="{{ route('profile.delete', $profile->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-xs  btn-flat show_confirm"
                                                        data-toggle="tooltip" title="Delete">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url('history') }}">ประวัติการซื้อ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <a href="{{ url('profile') }}" class="btn btn-dark">Add data</a> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
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
