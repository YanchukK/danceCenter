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
                        <div class="d-flex justify-content-center flex-sm-column flex-md-row flex-wrap">
                            {{--                            {{ link_to_route('group.create', 'Create group', null, ['class' => 'rounded-0 btn btn-outline-info btn-lg btn-block']) }}--}}
                            {{--                            @foreach ($groups as $model)--}}
                            <div class="rounded-0 card mt-3 w-100 h-25">
                                <img class="card-img-top h-25"
                                     src="/storage/img/teacher/{{$teachers->teacher_img}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    {{--                                        {{dd($groups)}}--}}
                                    <h4 class="card-title">{{$teachers->name}} {{$teachers->l_name}}</h4>
                                    <div class="card-text">
                                        <h6>{{$teachers->password}}</h6>
                                        <h6>{{$teachers->login}}</h6>
                                        <p>{{$teachers->email}}</p>
                                        <p>{{$teachers->p_number}}</p>
                                    </div>
                                    <div class="d-flex flex-sm-row flex-xs-column justify-content-center">
                                        {{ link_to_route('teacher.edit', 'Update', $teachers->id, ['class' => 'btn btn-lg btn-primary rounded-0 h-50 px-4']) }}
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['teacher.destroy', $teachers->id], 'method' => 'DELETE'])}}
                                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-lg rounded-0 px-4', 'type' => 'submit'])}}
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                            {{--@endforeach--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection