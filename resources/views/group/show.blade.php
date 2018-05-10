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
                        <div class="d-flex justify-content-center flex-sm-column flex-md-row flex-wrap">
                            {{--                            {{ link_to_route('group.create', 'Create group', null, ['class' => 'rounded-0 btn btn-outline-info btn-lg btn-block']) }}--}}
                            {{--                            @foreach ($groups as $model)--}}
                            <div class="rounded-0 card mt-3 w-100 h-25">
                                <img class="card-img-top h-25"
                                     src="/storage/img/group/{{$groups->group_img}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    {{--                                        {{dd($groups)}}--}}
                                    <h4 class="card-title">{{$groups->title}}</h4>
                                    <div class="card-text">
                                        <h6>{{$groups->teacher->name}} {{$groups->teacher->l_name}}</h6>
                                        <p>{{$groups->style->title}}</p>
                                        <p>{{$groups->branch->title}}</p>
                                        <p>{{$groups->date_time}}</p>
                                        <p>{{$groups->price->cost_for_one}}</p>
                                        @if($groups->notice_id !== NULL)
                                            <hr>
                                            <h4>{{$groups->notice->body}}</h4>
                                            <hr>
                                        @endif
                                    </div>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Last name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($groups->customers as $model)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$model->name}}</td>
                                                <td>{{$model->l_name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex flex-sm-row flex-xs-column justify-content-center">
                                        {{ link_to_route('group.edit', 'Update', $groups->id, ['class' => 'btn btn-lg btn-primary rounded-0 h-50 px-4']) }}
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['group.destroy', $groups->id], 'method' => 'DELETE'])}}
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