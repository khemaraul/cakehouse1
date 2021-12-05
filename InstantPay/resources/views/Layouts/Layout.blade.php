<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>InstantPay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
  <link href="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}" rel="stylesheet">
  <!-- <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">InstantPay</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Register</a>
        </li>
        </ul>
    <div class="collapse navbar-collapse" id="navbarText">
        @if (Route::has('login'))
        @auth
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Register</a>
        </li>
        </ul>
        @else
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        </ul>
        @endauth
        @endif
    </div>
    </nav>
    <div class="bg"></div>
</body>
</html>
