<div class="top-header">
    <nav class="navbar has-shadow">
        <div class="container is-fluid">
            <div class="navbar-brand">
                <a href="{{ route('home') }}" class="navbar-item is-padding brand-item">
                    <img src="{{ asset('images/icon.png') }}" alt="laravel.png" />
                </a>

            @if(Request::segment(1) == 'manage')
                <a class="navbar-item is-hidden-desktop" id="btn-sidemenu-out">
                    <span class="icon">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                </a>
            @endif

            <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    
                   
                </div>
                <div class="navbar-end">
                    @guest
                        <a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>
                        <a href="{{ route('register') }}" class="navbar-item is-tab">Register</a>
                    @else
                        <div class="navbar-item dropdown is-hoverable">
                            <div class="dropdown-trigger">
                                <a class="navbar-link">
                                Hey {{ Auth::user()->name }} 
                                 </a>
                                 </div>
                                <div class="navbar-dropdown is-right">
                             
                                    
                                    
                                    <a href="{{ route('manage.dashboard') }}" class="navbar-item">
                                        <span class="icon">
                                            <i class="fa fa-cog m-r-10"></i>
                                        </span>
                                    Manage</a>
                                    
                                  <hr class="navbar-divider">

                                    <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                    ">
                                        <span class="icon">
                                            <i class="fa fa-sign-out m-r-10"></i>
                                        </span>Logout</a>
                                        @include('_includes.forms.logout')
                                    
                                </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav> 
</div>