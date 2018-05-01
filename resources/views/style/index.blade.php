@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Styles</div>
                    {{--@if(session()->has('message'))--}}
                    {{--<div class="alert alert-success">--}}
                    {{--{{ session()->get('message') }}--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    <div class="panel-body">
                        <div class="d-flex justify-content-between flex-sm-column flex-md-row flex-wrap">
                            {{ link_to_route('style.create', 'Create style', null, ['class' => 'rounded-0 btn btn-outline-info btn-lg btn-block']) }}
                            @foreach ($styles as $model)
                                <div class="rounded-0 card mt-3" style="width: 22rem;">
                                    <img class="card-img-top"
                                         src="/storage/img/style/{{$model->style_img}}"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$model->title}}</h4>
                                        {{--<div class="card-text">--}}
                                            {{--<h6>{{$model->name}}</h6>--}}
                                            {{--<p>{{$model->address}}</p>--}}
                                            {{--<p>{{$model->p_number}}</p>--}}
                                            {{--<p>{{$model->w_hours}}</p>--}}
                                        {{--</div>--}}
                                        <div class="d-flex flex-sm-row flex-xs-column justify-content-center">
{{--                                            {{ link_to_route('style.show', 'View', $model->id, ['class' => 'btn btn-success rounded-0 h-50 px-4']) }}--}}
                                            {{ link_to_route('style.edit', 'Update', $model->id, ['class' => 'btn btn-primary rounded-0 h-50 px-4']) }}
                                            {{Form::open(['class' => 'confirm-delete', 'route' => ['style.destroy', $model->id], 'method' => 'DELETE'])}}
                                            {{Form::button('Delete', ['class' => 'btn btn-danger rounded-0 px-4', 'type' => 'submit'])}}
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection