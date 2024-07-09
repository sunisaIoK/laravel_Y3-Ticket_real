<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body  class="container">
    <div>
        <div class="card" style="background-color: #03011f26;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email">Email</label><br>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus>
                    </div>
                    <div>
                        <label for="password">Password</label><br>
                        <input id="password" type="password" name="password" required autocomplete="current-password" >
                    </div>
                    <div class="submit">
                        <button type="submit" style="font-size: 25px;">Login</button>
                    </div>
                </form>
                <br>
                <a href="{{ url('regis') }}" class="regis">Regis Here</a>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
