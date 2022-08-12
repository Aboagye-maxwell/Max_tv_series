<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/max.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/max.css') }}" rel="stylesheet">

    {{--    change the favicon--}}
    <link rel="icon" type="image/svg" href="/image/logo1.svg">


{{--    styling the movie cards--}}
    <style>

    </style>


</head>
<body>
<div id="app">
    <nav style="background-color: #3f6fb6;" class="navbar navbar-expand-md navbar-dark  shadow-sm py-0 p-0 sticky-top">
        <div class="container-fluid">
            <div  class="pt-2 pb-2 nav-image" >
                <img src="/image/logo.svg" style="width: 100%;width: 100%;">
            </div>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto ">

                    <li class="nav-item">
                        <a class="nav-link" href="/">TODAY</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/">TV SERIES</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">TRAILERS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">SERIES CALENDAR</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">DMCA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">ADS PARTNERSHIP</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/posts">BLOG</a>
                    </li>

                    <div style="border-left: 1px solid #ffffff;opacity: 60%;"></div>
                <li class="nav-item d-flex" style="height: 8px;">
                    <a class="nav-link" href="#"><img src="{{url('/image/twitter_logo.png')}}" alt="twitter"></a>

                    <a class="nav-link" href="#"><img src="{{url('/image/facebook_logo.png')}}" alt="facebook"></a>
                </li>


                @if(!Auth::guest())
                    @if(Auth::user()->name == 'admin')
                        <!-- Dropdown -->
                            <li class="nav-item dropdown" style="">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Upload New
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/series">new series</a>
                                    <a class="dropdown-item" href="/seasons">new season</a>
                                    <a class="dropdown-item" href="/episodes">new episode</a>
                                </div>
                            </li>
                        @endif
                    @endif


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->


{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->name }}--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}

                    {{--              Right side of navbar  --}}
                    <div class="">
                        <input class="pl-5 pr-5" style="background-color: rgba(0,0,0,0);outline: none;border: none;display: none;
                        color: white;" type="text"  name="search"  id="search" name="password">
                        <img src="/image/search.png" style="height: 20px;width: 20px;" id="s-btn" onclick="display()">
                        <div class="search-results">
                          <ul id="search-results">

                          </ul>
                        </div>
                    </div>

                </ul>





            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <main class="">
            @include('inc.messages')
            @yield('content')
            @extends('layouts.footer')
        </main>
    </div>
</div>
</body>
</html>
