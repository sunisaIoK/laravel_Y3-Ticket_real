<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rsgis</title>
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style="background-image: url('photo/cov.gif'); background-size: cover;"  >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card"style="border-radius: 35px;box-shadow: 10px 5px 50px 5px hsla(609, 34%, 12%, 0.951);" >
                    <div class="card-header" style="font-size: 50px">
                        Regis
                    </div>
                    <div class="card-body">
                        <form action="{{ route('regis.user') }}" method="POST" enctype="multipart/form-data">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="name"><h3>Name</h3></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter full name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                            </div>
                            <div class="form-group">
                                <label for="email"><h3>Email</h3></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                            </div>
                            <div class="form-group">
                                <label for="password"><h3>Password</h3></label>
                                <input type="text" name="password" class="form-control" placeholder="Enter Password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                            </div><br>
                            {{-- <div class="form-group">
                                <label for="file" >Choose Profile Image</label>
                                <input type="file" name="file" class="form-control" >
                            </div>
                            <span class="text-danger">
                                @error('file')
                                    {{ $message }}
                                @enderror
                            </span> --}}
                            <button class="btn btn-block " style="font-size: 20px;color:aliceblue">
                                Regis
                            </button>
                        </form>
                        <br>
                            <a href="{{ url('login') }}" class="regis">Login Here</a>

                    </div>
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
