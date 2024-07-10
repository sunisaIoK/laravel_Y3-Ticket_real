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
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- เลือกหมวดหมู่ --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <p>ชื่อคอนเสิร์ต</p>
                                <input type="text" class="form-control" name="concertname" required />
                                <p>ศิลปิน</p>
                                <input type="text" class="form-control" name="artist" required />
                                <p>รายละเอียด</p>
                                <textarea class="form-control" name="detail" required></textarea>
                                <div id="zones-wrapper">
                                    <div class="zone-group">
                                        <p>โซน</p>
                                        <input type="text" class="form-control" name="zones[0][zone_name]"
                                            required />
                                        <p>ราคาตั๋ว</p>
                                        <input type="number" step="0.01" class="form-control"
                                            name="zones[0][rateprice]" required />
                                    </div>
                                </div>
                                <button type="button" onclick="addZone()" class="addzone">เพิ่มโซน</button>

                                <div class="form-group"><br>
                                    <label for="imagecon">เลือกภาพคอนเสิร์ต</label>
                                    <input type="file" name="imagecon" class="form-control" required>
                                </div>
                                <div class="form-group"><br>
                                    <label for="imagemap">เลือกแผนที่คอนเสิร์ต</label>
                                    <input type="file" name="imagemap" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn">ยืนยัน</button>
                            </form>

                            <script>
                                function addZone() {
                                    const wrapper = document.getElementById('zones-wrapper');
                                    const index = wrapper.children.length;
                                    const newZone = `
        <div class="zone-group">
            <p>โซน</p>
            <input type="text" class="form-control" name="zones[${index}][zone_name]" required />
            <p>ราคาตั๋ว</p>
            <input type="number" step="0.01" class="form-control" name="zones[${index}][rateprice]" required />
        </div>
    `;
                                    wrapper.insertAdjacentHTML('beforeend', newZone);
                                }
                            </script>


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
