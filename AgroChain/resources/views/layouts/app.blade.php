    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Agrochain</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading-bar.min.css') }}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="loading-bar.css"/>

    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand text-green font-weight-bold" href="{{ url('/') }}">
                    Agrochain
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-green font-weight-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-green font-weight-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-green font-weight-bold" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                            </li>
                        @if(session('role') == 'admin')
                            <li class="nav-item">
                                <a class="nav-link text-green font-weight-bold" href="{{ route('crop.add') }}">{{ __('Add New Crop') }}</a>
                            </li>
                            @elseif(session('role') == 'farmer')
                                <li class="nav-item">
                                    <a class="nav-link text-green font-weight-bold" href="{{ route('projects.create') }}">{{ __('Create New Project ') }}</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-green font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                                    @if(session('role') == 'farmer')
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        @endif
                                    <p class="dropdown-item m-0" >Account: {{Auth::user()->account}}</p>
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
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/loading-bar.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
    <script>
        $(".info-item .btn").click(function(){
            $(".form-container").toggleClass("log-in");
        });
        $(".container-form .btn").click(function(){
            $(".form-container").addClass("active");
            $(".card-body").toggleClass("active");
        });
    </script>
    <script src="{{ asset('js/web3.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
