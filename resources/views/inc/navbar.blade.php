<nav class="navbar navbar-expand-lg navbar-laravel navbar-custom">
    <div class="container">
        <a class="navbar-brand navbar-logo" href="{{ url('/') }}">
            {{ config('app.name', 'Humla.') }}
        </a>
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item m-2">
                    {{ link_to_route('main_branches', 'Branches') }}
                </li>
                <li class="nav-item m-2">
                    {{ link_to_route('main_styles', 'Styles') }}
                </li>
                <li class="nav-item m-2">
                    {{ link_to_route('main_prices', 'Prices') }}
                </li>
                <li class="nav-item m-2">
                    {{ link_to_route('main_teachers', 'Teachers') }}
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                {{--<li><a class="btn btn-outline-info" href="{{route('post.create')}}" role="button">Create Post</a></li>--}}
                @guest
                    <li><a class="btn my-2 my-sm-0"
                           href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(Illuminate\Support\Facades\Auth::user()->middleware == '1a')
                                <a href="/home" class="dropdown-item">
                                    Dashboard
                                </a>
                            @endIf
                            @if(Illuminate\Support\Facades\Auth::user()->middleware == '2t')
                                <a href="/master" class="dropdown-item">
                                    Dashboard
                                </a>
                            @endIf
                            @if(Illuminate\Support\Facades\Auth::user()->middleware == '3c')
                                <a href="/learner" class="dropdown-item">
                                    Dashboard
                                </a>
                            @endIf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@if(Auth::check() && Auth::user()->middleware == '1a')
    <nav class="nav-logged">
        <ul class="nav-admin">
            <li>{{ link_to_route('branch.index', 'branches', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('group.index', 'groups', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('teacher.index', 'teachers', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('customer.index', 'customers', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('style.index', 'styles', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('notice.index', 'notices', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('price.index', 'prices', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('news.index', 'news', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
        </ul>
    </nav>
@endif
@if(Auth::check() && Auth::user()->middleware == '2t')
    <nav class="nav-logged">
        <ul class="nav-admin">
            <li>{{ link_to_route('group.index', 'Manage groups', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('teacher.show', 'Manage account', $teacherId, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('notice.index', 'Manage notices', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
        </ul>
    </nav>
@endif
@if(Auth::check() && Auth::user()->middleware == '3c')
    <nav class="nav-logged">
        <ul class="nav-admin">
            <li>{{ link_to_route('group.index', 'Manage groups', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('customer.show', 'Manage account', $customerId, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
            <li>{{ link_to_route('notice.index', 'Manage notices', null, ['class' => 'btn btn-info btn-lg btn-block']) }}</li>
        </ul>
    </nav>
@endif