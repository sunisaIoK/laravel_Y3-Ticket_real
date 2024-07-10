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
                    <img src="{{ asset('photo/logo.png') }}" alt="" width="400px">
                </a>
                    <div class="col" style="padding-top: 5%;">
                        <a href="/index" class="text" style="font-size: 23px">PAGE</a>
                    </div>
                    </div>
            </div>
</header>
<body>
    <center>
    <div class="container-edit" >
        <a href="{{ url('profileUser') }}" class="btn-b">back</a>
        <div class="row">
            <div class="col-md-12">
                <p class="text-end">
                </p>
                <div class="card">
                    <div class="card-header" style="font-size: 30px">
                        Edit
                    </div>
                    <div class="card-body">
                        @if (Session::has('profile_update'))
                        <div class="alert alert-success" role="alert">
                            {{  Session::get('profile_update') }}
                        </div>
                        @endif
                        <form action="{{  route('profile.update') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{  $profile->id }}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{  $profile->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="{{  $profile->email }}">
                            </div>
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
