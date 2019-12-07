<navbar 
    :user="{{ auth()->check() ? Auth::user(): 'asd' }}"
    inline-template>
    <nav style="position:fixed;width:100%;" class="navbar box py-0-5" role="navigation" aria-label="main navigation">
        <div style="margin-left:360px; margin-right:20px;" class="is-flex justify-content-between">
            <div class="navbar-brand">
                <!-- <a class="navbar-item" href="/dashboard">
                <img src="/images/logo.jpg">
                </a> -->

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <!-- <div class="navbar-start">
                    <template v-if="!user">
                        <a href="/" class="px-2 navbar-item">Beranda</a>
                    </template>
                    <template v-else>
                        <template v-if="user.role_id === 1">    
                            @include('layouts.navbar-admin')
                        </template>
                        
                        
                        <template v-else-if="user.role_id === 2">    
                            @include('layouts.navbar-employee')
                        </template>

                        <template v-else-if="user.role_id === 3">    
                            @include('layouts.navbar-division-manager')
                        </template>
                        
                        <template v-else-if="user.role_id === 4">    
                            @include('layouts.navbar-department-manager')
                        </template>

                        <template v-else-if="user.role_id === 5">    
                            @include('layouts.navbar-project-manager')
                        </template>
                    </template>
                </div> -->
                
                <div class="navbar-end">
                    @guest
                        <!-- <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif -->
                    @else
                        <a class="navbar-item">
                            <change-role :current-role="{{ $current_role }}" :roles="{{$roles}}" :user-props="user"></change-role>
                        </a>
                        <div style="padding:10px 0; border-right:0.5px solid #cccaca;"></div>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" v-text="user.name"></a>
                            <div class="navbar-dropdown py-0">
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
    </nav>
</navbar>