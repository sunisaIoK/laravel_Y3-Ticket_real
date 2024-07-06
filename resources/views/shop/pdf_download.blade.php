<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

        <div class="container">
            <div class="concert">
                <div class="bo-dy">
            <div class="container-head" >
                <div class="concert-b" >
                    @foreach ($orders as $order)
                    <td>{{ $order->concertname }}</td>
                    @endforeach
                </div>
            </div>
            <div class="container-body" >
                <div class="concert-body">
                    @foreach ($orders as $order)
                    <td>{{ $order->name }}</td>
                @endforeach
                </div>
            </div>
            <div class="container-body" >
                <div class="concert-body">
                    @foreach ($orders as $order)
                    <td>{{ $order->zone }}</td>
                @endforeach
                </div>
            </div>
            
            <div class="container-body" >
                <div class="concert-body">
                    @foreach ($orders as $order)
                    <td>{{ $order->date }}</td>
                @endforeach
                </div>
            </div>
            </div>
                <div class="jak">
                        JAK CONCERT
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
