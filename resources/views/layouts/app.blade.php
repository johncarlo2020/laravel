<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CSAS</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div class="navbar-brand " href="{{ url('/') }}"><img class="" src="{{ asset('images\logo.png') }}" alt="logo"> <span class="logo-text pr-2">CSAS</span></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                    @guest
                    @else
                    @if(is_null(Auth::user()->picture))
                    @else
                    <img class="rounded-circle" style="width:3em;max-height:3em;" alt="10x10" src="{{ asset(Auth::user()->picture) }}">
                    @endif
                    @endguest
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Pre-Enlistment</a>
                                </li>
                            @endif
                            
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                @if(Auth::user()->user_type_id == 2)
                                    Coordinator
                                @elseif(Auth::user()->user_type_id == 1)
                                    Staff
                                @else
                                    {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                                @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type_id != 1 and Auth::user()->user_type_id != 2 and Auth::user()->user_type_id != 7)
                                        @if(Auth::user()->user_type_id == 6)
                                            <a class="dropdown-item" href="{{ route('withfiless') }}" > Profile  </a>
                                        @elseif(Auth::user()->user_type_id == 3)
                                            <a class="dropdown-item" href="{{ route('withfilesss') }}" > Profile  </a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('withfiles') }}" > Profile  </a>
                                        @endif
                                        @if(Auth::user()->user_type_id == 7)
                                            <a class="dropdown-item" href="{{ route('applicant.declined') }}"> Status </a>
                                        @elseif(Auth::user()->user_type_id == 5)
                                            @if (is_null(auth()->user()->email_verified_at)) 
                                                <a class="dropdown-item" href="{{ route('verify') }}"> Status </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('applicant.home') }}"> Status </a>
                                            @endif
                                        @elseif(Auth::user()->user_type_id == 3 && is_null(Auth::user()->requirements))
                                            <a class="dropdown-item" href="{{ route('filesz') }}"> Upload Files </a>
                                        @elseif(Auth::user()->user_type_id == 6)
                                            <a class="dropdown-item" href="{{ route('applicant.examiner') }}"> Status </a>
                                        @endif
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}  </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">

            @yield('content')
        </main>
    </div>


    <!-- @jquery -->
    @toastr_js
    @toastr_css
    @toastr_render

</body>
</html>
