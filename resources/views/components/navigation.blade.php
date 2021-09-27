<div>
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
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout m-r-5 m-l-5"></i>
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
</div>