<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Edit</title>
    <link href="{{ asset('css/pouU.css') }}" rel="stylesheet">
</head>
<header>
    <div class="navbar" style="height: 200px">
            <div class="nav">
                <a class="logo">
                    <img src="{{ asset('photo/lo.png') }}" alt="" width="200px">
                </a>
                    <div class="col" style="padding-top: 5%;">
                        <a href="/index" class="text" style="font-size: 23px">Home</a>
                        <a href="#" class="text2" style="font-size: 23px">Concert</a>
                        <a href="#" class="text3" style="font-size: 23px">About Us</a>
                        <a href="#" class="text4" style="font-size: 23px">Contact</a>
                    </div>
                    </div>
            </div>
</header>
<body>
    <center>
    <div class="container-edit" >
        <div class="row">
            <div class="col-md-12">
                <p class="text-end"><a href="{{ url('Admin') }}" class="btn-b">back</a></p>
                <div class="card">
                    <div class="card-header" style="font-size: 30px">
                        Edit
                    </div>
                    <div class="card-body">
                        @if (Session::has('admin_update'))
                        <div class="alert alert-success" role="alert">
                            {{  Session::get('admin_update') }}
                        </div>
                        @endif
                        <form action="{{  route('admin.update') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{  $add->id }}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{  $add->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="{{  $add->email }}">
                            </div>
                            <div class="form-group">
                                <label for="file">Choose Profile Image</label>
                                <input type="file" name="file" class="form-control" onchange="previeFile(this)" >
                                <img id="previewImg" src="{{ asset('images') }}/{{ $add->profileimage }}" alt="image" style="max-width: 130px;margin-top:20px;">
                            </div><br>
                            <button type="submit" class="btn-d">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
