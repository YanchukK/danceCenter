@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-wrap justify-content-center mx-5">
        <div>
            @foreach ($prices as $model)
                <div class="card d-flex justify-content-center">
                    <h5 class="card-header">Prices</h5>
                    <div class="card-body">
                        <h5 class="card-title">Cost for one lesson ${{$model->cost_for_one}}</h5>
                        <h5 class="card-title">Cost for one mouth ${{($model->cost_for_one * 4) - 5}}</h5> <!-- Я знаю что костыль))) -->
                        <p class="card-text">
                            This is cost for all styles in our Dance Center
                        </p>
                        <a href="/" class="btn btn-primary">Go back</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection