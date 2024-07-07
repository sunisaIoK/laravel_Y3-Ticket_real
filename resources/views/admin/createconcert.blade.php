<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Add Concert</title>
    <link href="{{ asset('css/cus.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-end"><a href="{{ url('Admin') }}" class="btn btn-dark">Admin</a></p>
                <div class="card">
                    <div class="card-header">
                        Add Concert
                    </div>
                    <div>
                        <div class="card-body">
                            @if (Session::has('add-con'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('add-con') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('add.data') }}" enctype="multipart/form-data" method="POST"
                                style="position:relative">
                                @csrf
                                <p>หมวดหมู่</p>
                                <select name="categories" class="form-control" required>
                                    <option value="">-- เลือกหมวดหมู่ --</option>
                                    @foreach ($categories as $categories)
                                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                    @endforeach
                                </select>
                                <p>Concert Name</p>
                                <input type="text" class="form-control" name="concertname" />
                                <p>Artist</p>
                                <input type="text" class="form-control" name="artist" />
                                <p>Zone</p>
                                <input type="text" class="form-control" name="mapzone" required />
                                <p>Rate Price</p>
                                <input type="text" class="form-control" name="rateprice" required />
                                <p>Detail</p>
                                <input type="text" class="form-control" name="detail" required />
                                <p class="expcvv_text">Date</p>
                                <input type="Text" class="form-control" name="datecon" id="exp_date" required />
                                <div class="form-group"><br>
                                    <label for="file">Choose Concert Image</label>
                                    <input type="file" name="imagecon" class="form-control">
                                </div>
                                <div class="form-group"><br>
                                    <label for="file">Choose Map Concert</label>
                                    <input type="file" name="imagemap" class="form-control">
                                </div>
                                <br>
                                <button type="submit" class="btn ">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
