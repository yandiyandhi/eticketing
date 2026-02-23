<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" class="img-fluid">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">E-Ticketing</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Main Menu -->
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Main Referensi">Main Referensi</span>
        </li>

        <!-- Layouts -->
        <li class="menu-item {{ Route::is('department.index') ? 'open' : '' }}">        
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Data Ref">Data Ref</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('department.index') ? 'active' : '' }}">                
                    <a href="{{ route('department.index') }}" class="menu-link">
                        <div data-i18n="Departemen">Departemen</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Kategori">Kategori</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Status">Status</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Main Menu -->
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Main Menu">Main Menu</span>
        </li>

        <!-- Layouts -->
        <li class="menu-item {{ Route::is('ticketing.index') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Master Data">Master Data</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('ticketing.index') ? 'active' : '' }}">
                    <a href="{{ route('ticketing.index') }}" class="menu-link">
                        <div data-i18n="Request Ticketing">Request Ticketing</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
