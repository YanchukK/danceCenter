@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Teachers</div>
                    {{--@if(session()->has('message'))--}}
                    {{--<div class="alert alert-success">--}}
                    {{--{{ session()->get('message') }}--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    <div class="panel-body">
                        <div class="d-flex justify-content-between flex-sm-column flex-md-row flex-wrap">
                            {{ link_to_route('teacher.create', 'Create teacher', null, ['class' => 'rounded-0 btn btn-outline-info btn-lg btn-block']) }}
                            @foreach ($teachers as $model)
                                <div class="rounded-0 card mt-3" style="width: 22rem;">
                                    <img class="card-img-top"
                                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThcGuG6AcofBxB5bJHdyv__3BSU7_m9FDB_-gZby54l3VWSG7R"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$model->name}} {{$model->l_name}}</h4>
                                        <div class="card-text">
                                            <h6>{{$model->login}}</h6>
                                            <p>{{$model->password}}</p>
                                            <p>{{$model->email}}</p>
                                            <p>{{$model->p_number}}</p>
                                        </div>
                                        <div class="d-flex flex-sm-row flex-xs-column justify-content-center">
                                            {{ link_to_route('teacher.show', 'View', $model->id, ['class' => 'btn btn-success rounded-0 h-50 px-4']) }}
                                            {{ link_to_route('teacher.edit', 'Update', $model->id, ['class' => 'btn btn-primary rounded-0 h-50 px-4']) }}
                                            {{Form::open(['class' => 'confirm-delete', 'route' => ['teacher.destroy', $model->id], 'method' => 'DELETE'])}}
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