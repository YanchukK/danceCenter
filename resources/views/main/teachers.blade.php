@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center flex-sm-column flex-md-row">
        <h2>Teachers</h2>
    </div>
    <div class="d-flex justify-content-center flex-sm-column flex-md-row flex-wrap">
        @foreach ($teachers as $model)
            <div class="card m-3 order-{{$loop->count}} d-flex flex-md-row" style="width: 90vw;">
                <img class="card-img-top w-25 h-100"
                     src="/storage/img/teacher/{{$model->teacher_img}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$model->name . ' ' . $model->l_name}}</h4>
                    <div class="card-text">
                        @if(!$model->groups->isEmpty())
                            <h5>{{$model->groups->first()->style->title}}</h5>
                        @endif
                        <h6>{{$model->email}}</h6>
                        <p>{{$model->p_number}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection