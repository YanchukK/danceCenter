@extends('layouts.app')
@section('content')
{{--    <div>{{dd(Auth::user()->middleware)}}</div>--}}
    <section class="news-slider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
                </ol>
                @foreach($news as $model)
                    @if($loop->iteration == 1)
                        <div class="carousel-item active">
                            <img class="d-block slider-img" src="/storage/img/news/{{$model->news_img}}"
                                 alt="First slide">
                            <img class="logo-news" src="{{asset('img/news/news-logo.png')}}" alt="LOGO_NEWS">
                            <div class="carousel-caption d-none d-md-block ns-desc">
                                <h3>{{$model->title}}</h3>
                                <p>{{$model->desc}}</p>
                            </div>
                        </div>
                    @elseif($loop->iteration == 2)
                        <div class="carousel-item">
                            <img class="d-block slider-img" src="/storage/img/news/{{$model->news_img}}"
                                 alt="First slide">
                            <img class="logo-news" src="{{asset('img/news/news-logo.png')}}" alt="LOGO_NEWS">
                            <div class="carousel-caption d-none d-md-block ns-desc">
                                <h3>{{$model->title}}</h3>
                                <p>{{$model->desc}}</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img class="d-block slider-img" src="/storage/img/news/{{$model->news_img}}"
                                 alt="First slide">
                            <img class="logo-news" src="{{asset('img/news/news-logo.png')}}" alt="LOGO_NEWS">
                            <div class="carousel-caption d-none d-md-block ns-desc">
                                <h3>{{$model->title}}</h3>
                                <p>{{$model->desc}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="styles">
        <div class="styles-review">
            @foreach($styles as $style)
                <div class="s-board">
                    <img src="/storage/img/style/{{$style->style_img}}" alt="STYLE">
                    <h1>{{$style->title}}</h1>
                </div>
            @endforeach
        </div>
        <div class="left-side"></div>
        <div class="right-side">
            <h1>Styles.</h1>
        </div>
    </section>
    <section class="branches">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($branches as $key => $branch)
                    @if($loop->iteration == 1)
                        <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                                    @endif
                                    <div class="branch-slide">
                                        <div class="left-side">
                                            <h1>{{$branch->name}}</h1>
                                            <div class="img-block">
                                                <img class="d-block" src="/storage/img/branch/{{$branch->branch_img}}"
                                                     alt="First slide">
                                            </div>
                                        </div>
                                        <div class="right-side">
                                            <div class="r-text-block">
                                                <p class="inner-text">{{$branch->desc}}</p>
                                            </div>
                                            <h6>Some text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
                                                aut eos
                                                illo quas quo rem saepe tempora ut veniam, voluptate.</h6>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
            </div>
    </section>
    <section class="feedback" id="target">
        <h4>Send your <span>name</span> and <span>email</span> to as, and we invite you to first training for free!
        </h4>
        {!! Form::open(['route' => 'customer.store']) !!}
        <div class="form-group feedback-form">
            {!!Form::text('name', null, ['class' => 'form-control ff-control', 'placeholder' => ' Name', 'required']) !!}
            <br>
            {!!Form::text('email', null, ['class' => 'form-control ff-control', 'placeholder' => 'Email', 'required']) !!}
            <br>
            {!! Form::button('Go!', ['type' => 'submit', 'class' => 'btn btn-primary ff-btn']) !!}
        </div>
        {!! Form::close() !!}
    </section>
    <footer>
        ⒸEshkere!
    </footer>
@endsection