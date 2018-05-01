@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{--                        {{ link_to_route('branch.index', 'Manage branches', null, ['class' => 'btn btn-info btn-lg btn-block']) }}--}}
                        {{ link_to_route('group.index', 'Manage groups', null, ['class' => 'btn btn-info btn-lg btn-block']) }}
                        {{--                        {{ link_to_route('teacher.index', 'Manage teachers', null, ['class' => 'btn btn-info btn-lg btn-block']) }}--}}
                        {{ link_to_route('customer.show', 'Manage account', $customerId, ['class' => 'btn btn-info btn-lg btn-block']) }}
                        {{ link_to_route('notice.index', 'Manage notices', null, ['class' => 'btn btn-info btn-lg btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
