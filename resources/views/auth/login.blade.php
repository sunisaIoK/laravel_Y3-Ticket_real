<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style="background-image: url('photo/ticket2.gif'); background-size: cover;"  >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card"style="border-radius: 35px;box-shadow: 10px 5px 50px 5px hsla(609, 34%, 12%, 0.951);" >
                    {{-- <div class="card-header">
                       <h1>Login</h1>
                    </div> --}}
                    <div class="card-body">
                        {{-- <form action="{{ route('admin.admin') }}" method="POST" enctype="multipart/form-data">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                            <div>{{ Session::put('data',$name,$imges) }}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="email"  class="text-form"><h3>Email</h3></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-form"><h3>Password</h3></label>
                                <input type="text" name="password" class="form-control" placeholder="Enter Password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                             </div>
                          {{--  <div class="form-group">
                                <label for="file">Choose Profile Image</label>
                                <input type="file" name="file" class="form-control" >
                            </div><br> --}}
                            {{-- <br>
                            <div class="b">
                                <button class="btn" style="font-size: 20px;color:aliceblue">
                                Login
                            </button> --}}
                        {{-- </div>

                        </form> --}}
                        <form method="POST" action="{{ route('admin.admin') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
                        <br>
                            <a href="{{ url('regis') }}" class="regis">Regis Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
