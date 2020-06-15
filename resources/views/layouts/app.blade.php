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
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('js/plugins/moment.min.js') }}" defer></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('js/plugins/sweetalert2.js') }}" defer></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('js/plugins/jquery.validate.min.js') }}" defer></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}" defer></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}" defer></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}" defer></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}" defer></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}" defer></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}" defer></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{ asset('js/plugins/fullcalendar.min.js') }}" defer></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{ asset('js/plugins/jquery-jvectormap.js') }}" defer></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('js/plugins/nouislider.min.js') }}" defer></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('js/plugins/arrive.min.js') }}" defer></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="{{ asset('aps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') }}" defer></script> -->
    <!-- Chartist JS -->
    <script src="{{ asset('js/plugins/chartist.min.js') }}" defer></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}" defer></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-dashboard.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/bundle.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body  class="">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
