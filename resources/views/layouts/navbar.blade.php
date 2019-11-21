<nav class="navbar box p-0" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
            <img src="/images/logo.jpg">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                @guest
                <a href="/" class="px-2 navbar-item">Beranda</a>
                @else
                <a href="/users" class="px-2 navbar-item">User</a>
                <a href="/divisions" class="px-2 navbar-item">Divisi</a>
                <a href="/departments" class="px-2 navbar-item">Departemen</a>
                <a href="/projects" class="px-2 navbar-item">Proyek</a>
                <a href="/customers" class="px-2 navbar-item">Customer</a>
                <a href="/attendance_reports" class="px-2 navbar-item">Kehadiran</a>
                <a href="/request_employees" class="px-2 navbar-item">Permintaan</a>
                @endguest
            </div>
            
            <div class="navbar-end">
            @guest
                <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/users/{{ Auth::user()->id }}">
                            Profil
                        </a>
                        <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
            </div>

            </div>
        </div>
    </div>
</nav>