<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles -->

</head>
<body>
    <div class="jumbotron">
        <h1 class="display-3">NRG Reperoi</h1>
        <p class="lead"></p>
        <hr class="my-4">
        <p></p>
        <p class="lead">
            <a class="btn btn-info btn-lg" href="{{ route('login') }}" role="button">login</a>
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">register</a>
        </p>
    </div>
</body>
</html>
