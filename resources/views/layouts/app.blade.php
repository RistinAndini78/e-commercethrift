<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Oversize T-Shirt</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css" integrity="sha384-REPLACE_WITH_YOUR_INTEGRITY" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        /* Ubah ukuran font pada menu "Oversize T-Shirt" */
        .navbar-brand {
            font-size: 35px;
            font-weight: bold;
        }

        /* Ubah ukuran font pada item menu */
        .navbar-nav .nav-link {
            font-size: 17px;
        }

        /* Ubah ukuran font pada dropdown menu */
        .navbar-nav .nav-item.dropdown .dropdown-menu {
            font-size: 14px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container">
                <img src="{{ asset('storage/logo.png') }}" alt="Logo" width="50" height="40">
                <h4><b>{{  ('Oversize T-Shirt') }}</b></h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- navbar Home -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>

                        <!-- navbar Produk -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index_product') }}">Product</a>
                        </li>

                        <!-- navbar Keranjang -->
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('show_cart') }}">Cart</a>
                            </li>

                            <!-- navbar Pesanan -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index_order') }}">Order</a>
                            </li>
                        @endauth

                        <!-- Tautan Otentikasi -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Pindahkan Dropdown ke Sisi Kanan -->

                        <!-- Navbar Search -->
                        @auth
                            <li class="nav-item">
                                <form class="d-flex" action="{{ route('search') }}" method="GET">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                                    <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </li>
                        @endauth

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- Tautan Profil -->
                                <a class="dropdown-item" href="{{ route('show_profile') }}">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                                <!-- Garis Pemisah -->
                                <div class="dropdown-divider"></div>
                                <!-- Tautan Keluar -->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <!-- Formulir Keluar -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
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
