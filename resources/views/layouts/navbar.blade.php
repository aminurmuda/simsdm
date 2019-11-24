<navbar 
    :user="{{ auth()->check() ? Auth::user(): 'asd' }}"
    inline-template>
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
                    <template v-if="!user">
                        <a href="/" class="px-2 navbar-item">Beranda</a>
                    </template>
                    <template v-else>
                        <template v-if="user.role_id === 1">    
                            <a href="/users" class="px-2 navbar-item">User</a>
                            <a href="/divisions" class="px-2 navbar-item">Divisi</a>
                            <a href="/departments" class="px-2 navbar-item">Departemen</a>
                            <a href="/projects" class="px-2 navbar-item">Proyek</a>
                            <a href="/customers" class="px-2 navbar-item">Customer</a>
                            <a href="/attendance_reports" class="px-2 navbar-item">Kehadiran</a>
                            <a href="/request_employees" class="px-2 navbar-item">Permintaan</a>
                        </template>
                        
                        <template v-else-if="user.role_id === 4">    
                            <a href="/departments" class="px-2 navbar-item">Departemen</a>
                            <a href="/projects" class="px-2 navbar-item">Proyek</a>
                            <a href="/request_employees" class="px-2 navbar-item">Request Karyawan</a>
                            <a href="/attendance_reports" class="px-2 navbar-item">Kehadiran</a>
                        </template>
                        
                        <template v-else-if="user.role_id === 2">    
                            <a href="/projects" class="px-2 navbar-item">Proyek</a>
                            <a href="/request_employees" class="px-2 navbar-item">Permintaan Bergabung</a>
                            <a href="/attendance_reports" class="px-2 navbar-item">Kehadiran</a>
                        </template>
                    </template>
                </div>
                
                <div class="navbar-end">
                    @guest
                        <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a class="navbar-item">
                            <change-role :current-role="{{ $current_role }}" :roles="{{$roles}}" :user-props="user"></change-role>
                        </a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" v-text="user.name"></a>
                            <div class="navbar-dropdown py-0">
                                <a class="navbar-item" href="/users/{{ Auth::user()->id }}">
                                    Profil
                                </a>
                                <a class="navbar-item" href="/users/{{ Auth::user()->id }}/change-role">
                                    Change Role
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
    </nav>
</navbar>