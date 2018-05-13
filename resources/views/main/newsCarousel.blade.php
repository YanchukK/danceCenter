@extends('layouts.app')
@section('news')
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
    {{--todo MAKE rubberesly!--}}
@endsection