<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('admin/img/logox.png') }}" alt="Logo ">&nbsp; 
            <span class="d-none d-lg-block">Admin Area</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            @csrf 
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>    
                </a>
            </li>
            
            {{-- Profile Image Icon --}}
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('admin/img/profile.svg') }}" alt="Profile" class="rounded-circle">
                    {{-- Menggunakan Auth::guard('admin')->user()->username untuk data user --}}
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('admin')->user()->username ?? 'User' }}</span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::guard('admin')->user()->username ?? 'User' }}</h6>
                        <span>Denn | Develop</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        {{-- Menggunakan route() untuk link Settings --}}
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.settings.show') }}">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        {{-- Logout menggunakan form POST Laravel --}}
                        <a class="dropdown-item d-flex align-items-center" href="#" 
                           onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>