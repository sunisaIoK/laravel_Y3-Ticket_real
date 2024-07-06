<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Add Student</title>
    <link href="{{ asset('css/porU1.css') }}" rel="stylesheet">
</head>
<header><div class="navbar" >
            <div class="nav" >
                <a class="logo">
                    <img src="{{ asset('photo/384570185_1256346155028082_8847434753727363923_n-removebg-preview.png') }}" alt="">
                </a>
                    <div class="col" style="padding-top: 32px;">
                        <a href="/index" class="text">Home</a>
                        <a href="#" class="text">Category</a>
                        <a href="#" class="text">Concert</a>
                        <a href="#" class="text">About Us</a>
                        <a href="#" class="text">Contact</a>
                    </div>
                    </div>
            </div></header>
<body>
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-end"><a href="{{ url('profileUser') }}" class="btn btn-dark">All User</a></p>
                <div class="card">
                    <div class="card-header">
                        Add
                    </div>
                    <div>
                    <div class="card-body">
                        @if (Session::has('profile_add'))
                        <div class="alert alert-success" role="alert">
                            {{  Session::get('profile_add') }}
                        </div>
                        @endif
                        <form action="{{  route('profile.store') }}" enctype="multipart/form-data" method="POST" style="position:relative">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div><br>
                            <div class="form-group">
                                <label for="file">Choose Profile Image</label>
                                <input type="file" name="file" class="form-control" >
                            </div><br>
                             <button type="submit" class="btn btn-danger">Submit</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
