{{-- resources/views/admin/partials/sidebar.blade.php --}}
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        {{-- Dashboard --}}
        <li class="nav-item">
            <a class="nav-link @if(Route::is('admin.dashboard')) active @else collapsed @endif"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Service --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#service-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Service</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="service-nav" class="nav-content collapse " data-bs-parent="#service-nav">
                <li>
                    <a href="{{ route('admin.services.create') }}">
                        <i class="bi bi-circle"></i><span>Add Service</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}">
                        <i class="bi bi-circle active"></i><span>Manage Service</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Pages --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pages-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pages-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.pages.show', 'aboutus') }}">
                        <i class="bi bi-circle"></i><span>About Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pages.show', 'location') }}">
                        <i class="bi bi-circle"></i><span>Location</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Customer Nav --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.customers') }}">
                <i class="bi bi-card-list"></i>
                <span>Customer List</span>
            </a>
        </li>

        {{-- Invoices Nav --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.invoices.index') }}">
                <i class="bi bi-envelope"></i>
                <span>Invoices</span>
            </a>
        </li>

        {{-- Settings --}}
        <li class="nav-heading">Settings</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.settings.show') }}">
                <i class="bi bi-person"></i>
                <span>Settings</span>
            </a>
        </li>

        {{-- Error --}}


        {{-- Blank --}}

    </ul>
</aside>