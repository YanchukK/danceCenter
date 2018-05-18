@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center flex-sm-column flex-md-row">
        <h2>Styles</h2>
    </div>
    <div class="d-flex justify-content-center flex-sm-column flex-md-column flex-wrap">
        @foreach ($styles as $model)
            <div class="card m-3 order-{{$loop->count}} d-flex flex-md-row" style="width: 90vw;">
                <img class="card-img-top w-25 h-25"
                     src="/storage/img/style/{{$model->style_img}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title ct-custom">{{$model->title}}</h4>
                    <p class="card-title">{{$model->desc}}</p>
                    {{--<div class="card-text">--}}
                        {{--<h6>{{$model->name}}</h6>--}}
                        {{--<p>{{$model->address}}</p>--}}
                        {{--<p>{{$model->p_number}}</p>--}}
                        {{--<p>{{$model->w_hours}}</p>--}}
                    {{--</div>--}}
                </div>
            </div>
        @endforeach
    </div>

@endsection