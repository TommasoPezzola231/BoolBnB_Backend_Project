<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Libreria TomTom per visualizzare la mappa -->
    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav id="navbarLarge" class="col-lg-3 col-xl-3 col-xxl-2 bg-dark sidebar d-none d-lg-block position-fixed vh-100 ">
                    <div class="container-fluid vh-100 m-0 p-0">

                        <!-- Logo -->
                        <a class="navbar-brand text-white d-flex align-items-center flex-md-column  mb-4" href="#">
                            <img src="{{ asset('images/logo/Bool_Bnb_White.png') }}" alt="Logo" width="100px" height="100px" class="img-fluid p-0">
                            <h3 class="text-white m-0">BoolBnb</h3>
                        </a>


                        <ul class="navbar-nav ms-auto d-flex gap-5">

                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link text-white" href="http://localhost:5174/">
                                    <span class="fa-solid fa-home-alt fa-lg fa-fw me-2"></span>Torna al sito
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw me-2"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center {{ Route::currentRouteName() == 'admin.apartments.index' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.apartments.index') }}">
                                    <i class="fa-solid fa-building-user fa-lg fa-fw me-2"></i> I tuoi appartamenti
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center {{ Route::currentRouteName() == 'admin.apartments.create' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.apartments.create') }}">
                                    <i class="fa-solid fa-square-plus fa-lg fa-fw me-2"></i> Aggiungi appartamento
                                </a>
                            </li>

                            {{-- messaggi --}}
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center {{ Route::currentRouteName() == 'admin.messages.index' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.messages.index') }}">
                                    <i class="fa-solid fa-comments fa-lg fa-fw me-2"></i> Messaggi
                                </a>
                            </li>

                            {{-- sponsorships --}}
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center {{ Route::currentRouteName() == 'admin.sponsorships.index' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.sponsorships.index') }}">
                                    <i class="fa-solid fa-credit-card fa-lg fa-fw me-2"></i> Sponsorizzazioni
                                </a>
                            </li>

                                <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center {{ Route::currentRouteName() == 'admin.apartments.archive' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.apartments.archive') }}">
                                    <i class="fa-solid fa-box-archive fa-lg fa-fw me-2"></i> Archivio
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="http://localhost:5174/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw me-2"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Navbar for Tablet and Smaller Screens -->
                <nav id="navbarSmall" class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none position-fixed top-0 left-0 w-100 z-10">
                    <div class="container-fluid px-3">
                        <!-- Logo -->
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <img src="{{ asset('images/logo/Bool_Bnb_White.png') }}" alt="Logo" style="max-width: 100px;">
                            <h1 class="m-0">BoolBnb</h1>
                        </a>

                        <!-- Hamburger button for tablet and smaller screens -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                            aria-controls="sidebarMenu">
                            <i class="fa-solid fa-bars fa-lg"></i>
                        </button>


                        <!-- Navbar links (inside a collapse for tablet and smaller screens) -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="http://localhost:5174/">
                                        <i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'sidebarHover' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
                                        <i class="fa-solid fa-tachometer-alt fa-lg fa-fw me-2"></i> Dashboard
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.index' ? 'sidebarHover' : '' }}"
                                        href="{{ route('admin.apartments.index') }}">
                                        <i class="fa-solid fa-building-user fa-lg fa-fw me-2"></i> I tuoi appartamenti
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.create' ? 'sidebarHover' : '' }}"
                                        href="{{ route('admin.apartments.create') }}">
                                        <i class="fa-solid fa-square-plus fa-lg fa-fw me-2"></i> Aggiungi appartamento
                                    </a>
                                </li>

                                {{-- messaggi --}}
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.messages.index' ? 'sidebarHover' : '' }}"
                                        href="{{ route('admin.messages.index') }}">
                                        <i class="fa-solid fa-comments fa-lg fa-fw me-2"></i> Messaggi
                                    </a>
                                </li>

                                {{-- sponsorships --}}
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.sponsorships.index' ? 'sidebarHover' : '' }}"
                                        href="{{ route('admin.sponsorships.index') }}">
                                        <i class="fa-solid fa-credit-card fa-lg fa-fw me-2"></i> Sponsorizzazioni
                                    </a>
                                </li>

                                    <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.archive' ? 'sidebarHover' : '' }}"
                                        href="{{ route('admin.apartments.archive') }}">
                                        <i class="fa-solid fa-box-archive fa-lg fa-fw me-2"></i> Archivio
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white" href="http://localhost:5174/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-sign-out-alt fa-lg fa-fw me-2"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Sidebar Offcanvas -->
                <div class="offcanvas offcanvas-start" data-bs-backdrop="false" tabindex="-1" id="sidebarMenu">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="nav flex-column d-flex gap-5">

                            <li class="nav-item">
                                <a class="nav-link text-white" href="http://localhost:5174/">
                                    <i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Torna al sito
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw me-2"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.index' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.apartments.index') }}">
                                    <i class="fa-solid fa-building-user fa-lg fa-fw me-2"></i> I tuoi appartamenti
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.create' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.apartments.create') }}">
                                    <i class="fa-solid fa-square-plus fa-lg fa-fw me-2"></i> Aggiungi appartamento
                                </a>
                            </li>

                            {{-- messaggi --}}
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.messages.index' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.messages.index') }}">
                                    <i class="fa-solid fa-comments fa-lg fa-fw me-2"></i> Messaggi
                                </a>
                            </li>

                            {{-- sponsorships --}}
                            <li class="nav-item">
                                <a class="nav-link text-white{{ Route::currentRouteName() == 'admin.sponsorships.index' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.sponsorships.index') }}">
                                    <i class="fa-solid fa-credit-card fa-lg fa-fw me-2"></i> Sponsorizzazioni
                                </a>
                            </li>

                                <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.archive' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.apartments.archive') }}">
                                    <i class="fa-solid fa-box-archive fa-lg fa-fw me-2"></i> Archivio
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="http://localhost:5174/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw me-2"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <main class="col-md-12 col-lg-9 col-xl-9 col-xxl-10 px-0 mx-0 ms-sm-auto main_top">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
