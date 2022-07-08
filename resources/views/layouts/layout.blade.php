<!DOCTYPE HTML>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    >
    <title>LaraMusic</title>
</head>
<body style="overflow: hidden;" class="min-vh-100" >
<div class="container-fluid"  id="app">
    <div>
    <upper></upper>
    </div>
    <div class="row" style="height: 75%">
        <left-bar></left-bar>
        <div class="col w-75 bg-secondary bg-opacity-50" style="overflow: scroll">
            @yield('middleBar')
        </div>
        <div class="col col-1">
            <right-bar></right-bar>
        </div>
    </div>
    <div class="row">
        @if(Auth::check() == true)
            <div class="col bg-dark">
                <a href="{{route('user.index')}}" style="text-decoration: none">{{Auth::user()->name}}</a>
            </div>
        @else
        <div class="col bg-dark">
            <a href="{{route('user.index')}}" style="text-decoration: none">LOGIN</a>
        </div>
        @endif
    </div>
    </div>
<script src="{{ mix("js/app.js") }}" defer></script>
</body>
</html>
