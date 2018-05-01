@extends('layouts.panel')

@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New notice</b></div>
        </div>
    </div>

    <div class="panel-body">
        {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger">--}}
        {{--<ul>--}}
        {{--@foreach ($errors->all() as $error)--}}
        {{--<li>{{ $error }}</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--@endif--}}
{{--        {!! Form::open(['route' => 'branch.store']) !!}--}}
{{--        {{dd($branches)}}--}}style
        {!! Form::model($notices, ['route' => ['notice.update', $notices->id], 'method' => 'PUT']) !!}

        @include('notice._form')

        <div class="form-group">
            {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-block btn-lg btn-outline-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>
    @endsection
