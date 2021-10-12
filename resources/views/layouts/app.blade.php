
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
    <style>
        .bg-content{
            background-image: url({{ asset('assets/images/bg.png') }});
        }
    </style>
</head>

<body>
    {{-- Main Wrap --}}
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <x-navigation/>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            {{-- Sidbar Scroll --}}
            <x-sidebar/>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-12 ">
                        <h1 class="mb-0 fw-bold p-2 px-4 text-white" style="border-radius: 5px; background-color: rgb(56, 149, 255)">@yield('title')</h1>
                    </div>
                </div>
            </div>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="container-fluid bg-content">
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

