<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{$title ?? ''}}</title>

    @if(app()->environment(['production']))
        {{-- in "production" environment --}}
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"/>
    @endif



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
          integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}?ver={{ filemtime(public_path('css/style.css')) }}">


</head>
<body>
<div id="app">
    @include('layouts.header')
    <main class="main-content">
        @yield('content')
    </main>
</div>


<!-- Scripts -->
<script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('vendors/sweetalert/sweetalert2.min.js') }}"></script>
<script src="{{asset('js/general.js')}}?ver={{ filemtime(public_path('js/general.js')) }}" defer></script>
<script src="{{asset('js/main.js')}}?ver={{ filemtime(public_path('js/main.js')) }}" defer></script>

</body>
</html>
