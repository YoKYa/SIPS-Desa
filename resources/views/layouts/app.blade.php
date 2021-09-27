{{-- {{ dd(Request::is('surat/sk')) }} --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    {{-- Memberi Tahu Browser Scale layar --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Nama Aplikasi di ambil di .ENV --}}
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    {{-- Script --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Icon --}}
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/img/logo/logo.ico') }}" />
    {{-- Font --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}">
</head>

<body>
    {{-- Main Wrap --}}
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    {{-- Logo --}}
                    <a class="navbar-brand" href="{{ Route('home') }}">
                        {{-- Logo Icon --}}
                        <b class="logo-icon">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="30" class="mx-2">
                        </b>
                        {{-- Logo Text --}}
                        <span class="logo-text">
                            {{ config('app.name', 'Laravel') }}
                        </span>
                    </a>
                    {{-- Sidebar toogle Mobile --}}
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)">SISTEM INFORMASI PEMBUATAN SURAT DESA SANGGRAHAN</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @auth
                                {{ auth()->user()->name }}
                                @endauth
                                @guest
                                MENU
                                @endguest

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                @guest
                                <a class="dropdown-item" href="{{ Route('login') }}"><i
                                        class="mdi mdi-login-variant m-r-5 m-l-5"></i>
                                    Login</a>
                                <a class="dropdown-item" href="{{ Route('register') }}"><i
                                        class="mdi-login mdi m-r-5 m-l-5"></i>
                                    Register</a>
                                @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();"><i class="mdi mdi-logout m-r-5 m-l-5"></i>
                                    Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @endguest
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            {{-- Sidbar Scroll --}}
            <div class="scroll-sidebar">
                {{-- Sidebar Navigation --}}
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="in">
                        @guest
                        <li class="sidebar-item @if(Request::is('/login')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="{{ Route('login') }}" aria-expanded="false"><i class="mdi mdi-login"></i><span
                                    class="hide-menu">Login</span></a></li>
                        <li class="sidebar-item @if(Request::is('/register')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                                href="{{ Route('register') }}" aria-expanded="false"><i
                                    class="mdi mdi-login-variant"></i><span class="hide-menu">Register</span></a></li>
                        @endguest
                        @auth
                        <li class="sidebar-item @if(Request::is('/')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('/')) active @endif"
                                href="{{ Route('home') }}" aria-expanded="false"><i
                                    class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        @if (auth()->user()->status == 'Admin')
                        <li class="sidebar-item @if(Request::is('surat')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('surat')) active @endif"
                                href="{{ Route('surat') }}" aria-expanded="false"><i class="mdi mdi-email"></i><span
                                    class="hide-menu">Pemesanan Surat</span></a>
                        </li>
                        <li class="sidebar-item @if(Request::is('surat/sk')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('surat/sk')) active @endif"
                                href="{{ Route('surat.keluar') }}" aria-expanded="false"><i
                                    class="mdi mdi-email-open"></i><span class="hide-menu">Surat Keluar</span></a>
                        </li>
                        @else
                        <li class="sidebar-item @if(Request::is('surat')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('surat.masuk')) active @endif"
                                href="{{ Route('surat') }}" aria-expanded="false"><i class="mdi mdi-email"></i><span
                                    class="hide-menu">Surat Masuk</span></a>
                        </li>
                        <li class="sidebar-item @if(Request::is('surat/sk')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('surat/sk')) active @endif"
                                href="{{ Route('surat.keluar') }}" aria-expanded="false"><i
                                    class="mdi mdi-email-open"></i><span class="hide-menu">Riwayat Surat</span></a>
                        </li>
                        @endif
                        <li class="sidebar-item @if(Request::is('apbd')) selected @endif">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('apbd')) active @endif"
                                href="{{ Route('apbd') }}" aria-expanded="false"><i class="mdi mdi-email-open"></i><span
                                    class="hide-menu">APBD</span></a>
                        </li>
                        <li class="text-center p-40 upgrade-btn">
                            <a class="btn d-block w-100 btn-danger text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();"><i class="mdi mdi-logout m-r-5 m-l-5"></i>
                                Logout</a>
                        </li>
                        @endauth
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h1 class="mb-0 fw-bold">@yield('title')</h1>
                    </div>
                </div>
            </div>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- Script --}}
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.js') }}"></script>
</body>

</html>


{{-- 
        <nav class="bg-white shadow-sm navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
<img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="30" class="mx-2">
{{ config('app.name', 'Laravel') }}
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="mr-auto navbar-nav">

    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="ml-auto navbar-nav">
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
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

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
--}}