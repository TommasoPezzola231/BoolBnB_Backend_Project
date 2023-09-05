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
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse fixed-top vh-100">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">

                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/logo/Bool_Bnb_White.png') }}" alt="Logo">
                                <h3 class="text-white m-0">BoolBnb</h3>
                            </div>

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

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.archive' ? 'sidebarHover' : '' }}"
                                    href="{{ route('admin.apartments.archive') }}">
                                    <i class="fa-solid fa-box-archive fa-lg fa-fw me-2"></i> Archivio
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
                                <a class="nav-link text-white" href="http://localhost:5174/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw me-2"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>

                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')


                </main>
            </div>
        </div>

    </div>
</body>

</html>
