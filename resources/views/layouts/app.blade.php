<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('scripts')
    <link rel="stylesheet" href="/frontend/css/styles.css">




</head>
<body>
    <div id="app">
        <nav id="main" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                        <form action="{{url('search')}}" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" name="query" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary">search</button>
                            </div>
                        </form>
                        </li>
                        <li class="nav-item">     <a class="nav-link" href="/blog">Blog</a>
                    </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li>
                        <li class="nav-item">     <a class="nav-link" href="/profile" > Profile </a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (auth::user()->admin == true)
                                    <a class="dropdown-item" href="/admin" >
                                        Admin
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>



                            </li>
                        </li>
                        <li class="nav-item">
                            <a href="#"  class="w3-wrapper sdp-glow">
                                <svg class="notify-icon" viewBox="6 4 30 30">
                                   <path d="M19.1818,30.5455h3.6364a0,0,0,0,1,0,0v.9091A1.8182,1.8182,0,0,1,21,33.2727h0a1.8182,1.8182,0,0,1-1.8182-1.8182v-.9091A0,0,0,0,1,19.1818,30.5455Z"></path>
                                   <path d="M20.9091,8.7273h.1818a.8182.8182,0,0,1,.8182.8182v2.8182a0,0,0,0,1,0,0H20.0909a0,0,0,0,1,0,0V9.5455A.8182.8182,0,0,1,20.9091,8.7273Z"></path>
                                   <path d="M21,12.5455q.2061,0,.4154.0134a6.3426,6.3426,0,0,1,5.7664,6.4486v2.9269a19.3045,19.3045,0,0,0,.8675,5.702H13.9507a19.3045,19.3045,0,0,0,.8675-5.702V18.7273A6.1887,6.1887,0,0,1,21,12.5455m0-2a8.1816,8.1816,0,0,0-8.1818,8.1818v3.2071A17.2221,17.2221,0,0,1,11,29.6364H31a17.2221,17.2221,0,0,1-1.8182-7.702V19.0075a8.368,8.368,0,0,0-7.6372-8.4444q-.274-.0177-.5446-.0176Z"></path>
                               </svg>
                              <span class="w3-count">5</span>
                            </a>
                        </li>


                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                focusable="false" role="img">
                <rect fill="#007aff" width="100%" height="100%" /></svg>
              <strong class="mr-auto">Bootstrap</strong>
              <small class="text-muted">11 mins ago</small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              Hello, world! This is a toast message.
            </div>
          </div>

        <main class="py-4">
            @yield('content')
        </main>
        <div>
            @include('layouts.footer')
        </div>
    </div>

    <script src="{{ asset('/frontend/js/myjs.js')}}"></script>
</body>
</html>
