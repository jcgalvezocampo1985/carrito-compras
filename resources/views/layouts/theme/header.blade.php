<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item flex-row">
            <li class="nav-item theme-logo">
                <a href="{{ url('/home') }}">
                    <img src="assets/img/laravel.jpg" class="navbar-logo" alt="logo">
                    <b style="font-size: 19px; color: #3b3f5c;">Compras</b>
                </a>
            </li>
        </ul>
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>
        <ul class="navbar-item flex-row navbar-dropdown">
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="dropdown-item">
                        <a href="{{ url('/register') }}"><span>Registrarse</span></a>
                    </div>
                    @guest
                    <div class="dropdown-item">
                        <a href="{{ url('/login') }}"><span>Iniciar Sesión</span></a>
                    </div>
                    @else
                    <div class="dropdown-item">
                        <a href="{{ url('/logout') }}"><span>Cerrar Sesión</span></a>
                    </div>
                    @endguest
                </div>
            </li>
        </ul>
    </header>
</div>
