<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
{{--bootstrap material--}}
    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    {{--@if(!empty(Illuminate\Support\Facades\Auth::user()->middleware))--}}
        {{--{{dump(Illuminate\Support\Facades\Auth::user()->middleware)}}--}}
    {{--@endif--}}
    @if(empty(\Request::route()->getName()))
    <div class="d-inline-flex flex-row hello-section">
        <div class="left-side-hello-s hello-s-self d-flex">
            <div class="vertical-text">
                <p>Lorem!</p>
            </div>
            <div class="text-wrapper">
                <p class="top-left-text">Lorem ipsum.</p>
                <div class="bottom-text-block">
                    <p>Do you want start trainign now? Ready?</p>
                    <button type="button" class="btn btn-outline-dark start-btn">GO!</button>
                </div>
            </div>
        </div>
        <div class="right-side-hello-s hello-s-self d-flex">
            <img src="{{asset('img/header/35.jpg')}}" alt="">
            <div class="logo">
                <img src="{{asset('img/header/logo.png')}}" alt="">
            </div>
        </div>
    </div>
    @endif
    @include('inc.navbar')
    <main>
        @yield('content')
    </main>
</div>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
{{--<script>--}}
    {{--$('.carousel').carousel({--}}
        {{--ride: 'false'--}}
    {{--})--}}
{{--</script>--}}
</body>
</html>
