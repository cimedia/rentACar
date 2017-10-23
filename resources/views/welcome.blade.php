<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rent a car</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{ Html::style('css/welcome.css') }}
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Rent a car
                </div>

                <div class="links">
                    <a href="{{ route('cars.index') }}">Cars</a>
                    <a href="{{ route('clients.index') }}">Clients</a>
                    <a href="{{ route('rentHistory.index') }}">Rent history</a>
                    <a href="https://github.com/cimedia/rentACar">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
