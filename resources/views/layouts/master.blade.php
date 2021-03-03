<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- -------- Start of Css -------- --}}
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    {{-- -------- End of Css -------- --}}
</head>
<body>
    {{-- -------- Start of Navbar -------- --}}
    @include('layouts.nav')
    {{-- -------- End of Navbar -------- --}}
    
    {{-- -------- Start of Content -------- --}}
    @yield('content')
    {{-- -------- End of Content -------- --}}

    {{-- -------- Start of Js -------- --}}
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    {{-- -------- End of Js -------- --}}
</body>
</html>
