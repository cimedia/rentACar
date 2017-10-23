<!DOCTYPE html>
<html>
<head>
    <title>Rent a car</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
          rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="pull-left">
            <a class="btn btn-info" href="/"> Main page</a>
            <a class="btn btn-info" href="{{ route('cars.index') }}"> Cars</a>
            <a class="btn btn-info" href="{{ route('clients.index') }}"> Clients</a>
            <a class="btn btn-info" href="{{ route('rentHistory.index') }}"> Rent history</a>
        </div>
    </div>
    <br><br>
    @yield('content')
</div>

</body>
</html>