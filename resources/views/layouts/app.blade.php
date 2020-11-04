<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap_theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/svg" href="/images/logo.svg">
    <title> @yield('pagename')</title>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand mr-1" href="{{ url('/') }}">
                    <img src="{{url('/images/logo.svg')}}" alt="Hackrivals" />
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    HACKRIVALS
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
                            <a class="nav-link" data-toggle="modal" data-target="#login">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#register">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @if (Auth::user()->user_type == 'admin')
                        <li class="nav-item {{(request()->is('admin/users')) ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/users">Users</a>
                        </li>
                        <li class="nav-item {{(request()->is('admin/competitions')) ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/competitions">Competitiions</a>
                        </li>
                        <li class="nav-item {{(request()->is('admin/classrooms')) ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/classrooms">Classrooms</a>
                        </li>
                        <li class="nav-item {{(request()->is('admin/problems')) ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/problems">Problems</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/admin/competitions">Competitions</a>
                                <a class="dropdown-item" href="/admin/classrooms">Classrooms</a>
                                <a class="dropdown-item" href="/admin/problems">Problems</a>
                                <a class="dropdown-item" href="/admin/admins">Admins</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="nav-item {{(request()->is('home')) ? 'active' : '' }}">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item {{(request()->is('my_competitions')) ? 'active' : '' }}">
                            <a class="nav-link" href="/my_competitions">My Competitiions</a>
                        </li>
                        <li class="nav-item {{(request()->is('my_classrooms')) ? 'active' : '' }}">
                            <a class="nav-link" href="/my_classrooms">My Classrooms</a>
                        </li>
                        <li class="nav-item {{(request()->is('rankings')) ? 'active' : '' }}">
                            <a class="nav-link" href="/rankings">Rankings</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/my_competitions">My Competitions</a>
                                <a class="dropdown-item" href="/my_classrooms">My Classrooms</a>
                                <a class="dropdown-item" href="/user_admin">Administration</a>
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4 pb-5">
            @if( Session::get('error') ?? 0 )
            <div class="container">
                <div class="row bg-light py-3 justify-content-center">
                    <div class="bg-light text-danger"> <b> {{ Session::get('error') ?? '' }} </b> </div>
                </div>
            </div>
            @endif

            @yield('content')
        </main>

    </div>

    <!-- Footer -->
    <footer class="py-3 bg-primary" style="position: fixed; bottom: 0; width: 100%;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; HackRivals 2020</p>
        </div>
        <!-- /.container -->
    </footer>

</body>

</html>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Total Points", "Aggregate Points"],
            datasets: [{
                label: 'Your Points',
                // sizes
                data: [{{$points ?? ''}},{{$aggregatedpoints ?? ''}} ],
                backgroundColor: [
                    '#6b1111',
                    '#262626'
                ],
                borderColor: [
                    '#444',
                    '#444'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>