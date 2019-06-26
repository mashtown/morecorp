<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('assets/build/mcorp.min.css') }}" rel="stylesheet">

</head>
<body class="dashobard">

    @include('layouts.partials.dashboard-nav')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3" id="sidebar">
                sub-menu
            </div>
            <div class="col-sm-9" id="main-content">
                @yield('content')         
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/build/mcorp.min.js') }}"></script>
</body>
</html>
