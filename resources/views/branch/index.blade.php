@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Branches</div>
                    {{--@if(session()->has('message'))--}}
                    {{--<div class="alert alert-success">--}}
                    {{--{{ session()->get('message') }}--}}
                    {{--</div>--}}
                    {{--@endif--}}
                    <div class="panel-body">
                        {{ link_to_route('branch.create', 'Create branch', null, ['class' => 'rounded-0 btn btn-outline-info btn-lg btn-block', 'style' => 'margin: 0 1rem 1rem 1rem']) }}
                        <div class="d-flex justify-content-center flex-sm-column flex-md-row">
                            @foreach ($branches as $model)
                                <div class="card m-3" style="width: 20rem;">
                                    <img class="card-img-top"
                                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThcGuG6AcofBxB5bJHdyv__3BSU7_m9FDB_-gZby54l3VWSG7R"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$model->title}}</h4>
                                        <div class="card-text">
                                            <h6>{{$model->name}}</h6>
                                            <p>{{$model->address}}</p>
                                            <p>{{$model->p_number}}</p>
                                            <p>{{$model->w_hours}}</p>
                                        </div>
                                        <div class="d-flex flex-sm-row flex-xs-column justify-content-center">
                                            {{ link_to_route('branch.edit', 'Update', $model->id, ['class' => 'btn btn-primary rounded-0 h-50 px-4']) }}
                                            {{Form::open(['class' => 'confirm-delete', 'route' => ['branch.destroy', $model->id], 'method' => 'DELETE'])}}
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