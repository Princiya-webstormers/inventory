<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventory') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{url('css/custom.css')}}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="loading authentication-bg authentication-bg-pattern loginbg">
    @yield('content')
</body>
<script src="{{url('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{url('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{url('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{url('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
<script src="{{url('assets/libs/feather-icons/feather.min.js')}}"></script>

<!-- App js -->
<script src="{{url('assets/js/app.min.js')}}"></script>
</html>
