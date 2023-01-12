<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPK-Partner</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Favicon -->
    <link href="{{ url('img_admin/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('lib_admin/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib_admin/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('css_admin/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('css_admin/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #287164;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SPK-Partner
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <li class="nav-item">
                                <a class="nav-link" href="#" >
                                    <!-- {{ Auth::user()->name }} -->
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" role="button" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: #EEE732;">
                                {{ __('Logout') }}
                                </a>
                            </li>

                                <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> -->

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background-color: #C5C5C5;">


        @guest
                            
                        @else
                            

                        <!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3" style="background-color: #0CBCA1;">
            <nav class="navbar">
                <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2" style="color: #EEE732;">SPK-Partner</i></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ url('img_admin/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span class="text-light">{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('home') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('kriteria.index') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Kriteria</a>
                    <a href="{{ route('subkriteria.index') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Sub-Kriteria</a>
                    <a href="{{ route('alternatif.index') }}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Alternatif</a>
                    <a href="{{ route('nilai.index') }}" class="nav-item nav-link"><i class="fa fa-pen me-2"></i>Penilaian</a>
                    <a href="{{ URL('hasil') }}" class="nav-item nav-link"><i class="fa fa-file me-2"></i>Hasil</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

                                        @csrf                            
                        @endguest

                        <div class="content" style="background-color: #C5C5C5;">

                        @yield('content')
                        </div>
        </main>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('lib_admin/chart/chart.min.js') }}"></script>
    <script src="{{ url('lib_admin/easing/easing.min.js') }}"></script>
    <script src="{{ url('lib_admin/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('lib_admin/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('lib_admin/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ url('lib_admin/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ url('lib_admin/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('js_admin/main.js') }}"></script>
</body>
</html>
