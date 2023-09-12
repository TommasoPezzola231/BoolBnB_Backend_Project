<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
    rel="stylesheet"
    />

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer'
    />

    {{-- fav icon  --}}
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon_black.ico') }}" type="image/x-icon">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm position-fixed top-0 left-0 w-100 col-12 d-flex align-items-center px-3 my_z_index">

                    <a class="navbar-brand d-flex align-items-center" href="{{ url('http://localhost:5174/') }}" >
                        <img class="img-fluid" src="{{ asset('images/logo/Bool_Bnb_Black.png') }}" alt="Logo" width="80px" height="80px">
                        <h1 class="my_title_color_text m-0">BoolBnB</h1>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link my_header_color_text" href="{{url('http://localhost:5174/') }}">{{ __('Home pubblica') }}</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link my_header_color_text" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link my_header_color_text" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                </nav>

                {{-- form --}}
                <main class="my_bg_form_page col-12">
                    <div class="my_form_content">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col col-xl-10">
                                    <div class="card shadow" style="border-radius: 1rem;">
                                        <div class="row g-0">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
