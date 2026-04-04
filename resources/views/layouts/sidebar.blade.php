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

        <li class="menu-item {{ request()->routeIs('dashboard', 'ticketing.status') ? 'active' : '' }}">
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
        <li
            class="menu-item {{ Route::is('kantor.index', 'department.index', 'statuses.index', 'category.index', 'kpi.index', 'kantor.create', 'kantor.edit', 'user.index', 'user.create', 'user.edit', 'user.password') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-package"></i>
                <div data-i18n="Data Ref">Data Ref</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('kantor.index', 'kantor.create', 'kantor.edit') ? 'active' : '' }}">
                    <a href="{{ route('kantor.index') }}" class="menu-link">
                        <div data-i18n="Kantor">Kantor</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('department.index') ? 'active' : '' }}">
                    <a href="{{ route('department.index') }}" class="menu-link">
                        <div data-i18n="Departemen">Departemen</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('category.index') ? 'active' : '' }}">
                    <a href="{{ route('category.index') }}" class="menu-link">
                        <div data-i18n="Kategori">Kategori</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('statuses.index') ? 'active' : '' }}">
                    <a href="{{ route('statuses.index') }}" class="menu-link">
                        <div data-i18n="Status">Status</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('kpi.index') ? 'active' : '' }}">
                    <a href="{{ route('kpi.index') }}" class="menu-link">
                        <div data-i18n="KPI">KPI</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Route::is('user.index', 'user.create', 'user.edit', 'user.password') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <div data-i18n="User">User</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Main Menu -->
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Main Menu">Main Menu</span>
        </li>

        <!-- Layouts -->
        <li class="menu-item {{ Route::is('ticketing.index', 'ticketing.edit') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-server"></i>
                <div data-i18n="Master Data">Master Data</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('ticketing.index', 'ticketing.edit') ? 'active' : '' }}">
                    <a href="{{ route('ticketing.index') }}" class="menu-link">
                        <div data-i18n="Request Ticketing IT">Request Ticketing IT</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Request Ticketing HR">Request Ticketing HR</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Report">Report</span>
        </li>

        <li class="menu-item {{ Route::is('ticketing.reports') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-files"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('ticketing.reports') ? 'active' : '' }}">
                    <a href="{{ route('ticketing.reports') }}" class="menu-link">
                        <div data-i18n="Tiketing">Tiketing</div>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Aset">Aset</div>
                    </a>
                </li> --}}
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
