<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book Author</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        input {
            margin-bottom: 20px;
        }

        .btn {
            padding: 5px 10px !important;
        }
    </style>
</head>
<body>
<div id="app">
{{--    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px">--}}
        <!-- Left navbar links -->
        {{--                <ul class="navbar-nav">--}}
        {{--                    <li class="nav-item d-none d-sm-inline-block">--}}
        {{--                        <a href="@if(auth()->check())--}}
        {{--                        @if(auth()->user()->role === \App\Models\User::ROLE_AUTHOR)--}}
        {{--                        {{route('author')}}--}}
        {{--                        @endif--}}
        {{--                        @endif--}}
        {{--                        {{route('home')}}" class="nav-link">Home</a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
{{--        <div class="container">--}}
            <!-- Right Side Of Navbar -->
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                @guest--}}
{{--                    <li class="nav-item d-none d-sm-inline-block">--}}
{{--                        <a href="{{ url('/users/signin') }}" class="nav-link">Sign in</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item d-none d-sm-inline-block">--}}
{{--                        <a href="{{ url('/users/signup') }}" class="nav-link">Sign up</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="nav-item d-none d-sm-inline-block">--}}
{{--                        <a href="{{ url('signout') }}" class="nav-link">Sign out</a>--}}
{{--                    </li>--}}
{{--                @endguest--}}
{{--            </ul>--}}

            {{--                    <ul class="navbar-nav ms-auto">--}}
            {{--                        <!-- Authentication Links -->--}}
            {{--                        @guest--}}
            {{--                            @if (Route::has('login'))--}}
            {{--                                <li class="nav-item">--}}
            {{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
            {{--                                </li>--}}
            {{--                            @endif--}}

            {{--                            @if (Route::has('register'))--}}
            {{--                                <li class="nav-item">--}}
            {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
            {{--                                </li>--}}
            {{--                            @endif--}}
            {{--                        @else--}}
            {{--                            <li class="nav-item dropdown">--}}
            {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
            {{--                                    {{ Auth::user()->name }}--}}
            {{--                                </a>--}}

            {{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
            {{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
            {{--                                       onclick="event.preventDefault();--}}
            {{--                                                     document.getElementById('logout-form').submit();">--}}
            {{--                                        {{ __('Logout') }}--}}
            {{--                                    </a>--}}

            {{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
            {{--                                        @csrf--}}
            {{--                                    </form>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                        @endguest--}}
            {{--                    </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}


{{--    <main class="py-4">--}}
        @yield('content')
{{--    </main>--}}
</div>
</body>
</html>
