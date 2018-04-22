@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ link_to_route('branch.index', 'Manage branches', null, ['class' => 'btn btn-info btn-lg btn-block']) }}
                        {{ link_to_route('branch.index', 'Manage branches', null, ['class' => 'btn btn-info btn-lg btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
