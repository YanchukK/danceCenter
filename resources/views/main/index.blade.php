@extends('layouts.app')
@section('content')
    <section class="news-slider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="false">
            <div class="carousel-inner">
                {{--todo showing two same img, fix it!--}}
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
                </ol>
                @foreach($news as $model)
                    @if($loop->iteration == 1)
                        <div class="carousel-item active">
                            <img class="d-block slider-img" src="/storage/img/news/{{$model->news_img}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$model->title}}</h5>
                                <p>{{$model->desc}}</p>
                            </div>
                        </div>
                    @elseif($loop->iteration == 2)
                        <div class="carousel-item">
                            <img class="d-block slider-img" src="/storage/img/news/{{$model->news_img}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$model->title}}</h5>
                                <p>{{$model->desc}}</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item slider-img">
                            <img class="d-block" src="/storage/img/news/{{$model->news_img}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$model->title}}</h5>
                                <p>{{$model->desc}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection