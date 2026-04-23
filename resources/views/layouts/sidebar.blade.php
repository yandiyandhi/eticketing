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
            class="menu-item {{ Route::is('kantor.index', 'department.index', 'statuses.index', 'category.index', 'kpi.index', 'kantor.create', 'kantor.edit', 'user.index', 'user.create', 'user.edit', 'user.password', 'user.role', 'divisi.index', 'divisi.create', 'divisi.edit', 'aset.create', 'jenisAset.index', 'aset.create', 'jabatan.create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-package"></i>
                <div data-i18n="Data Ref">Data Ref</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('kantor.index', 'kantor.create', 'kantor.edit') ? 'active' : '' }}">
                    @can('kantor.view')
                        <a href="{{ route('kantor.index') }}" class="menu-link">
                            <div data-i18n="Kantor">Kantor</div>
                        </a>
                    @else
                        <a href="javascript:void(0)" class="menu-link">
                            <div data-i18n="Kantor">Kantor</div>
                        </a>
                    @endcan
                </li>
                <li class="menu-item {{ Route::is('department.index') ? 'active' : '' }}">
                    @can('departemen.view')
                        <a href="{{ route('department.index') }}" class="menu-link">
                            <div data-i18n="Departemen">Departemen</div>
                        </a>
                    @else
                        <a href="javascript:void(0)" class="menu-link">
                            <div data-i18n="Departemen">Departemen</div>
                        </a>
                    @endcan
                </li>
                <li class="menu-item {{ Route::is('divisi.index', 'divisi.create', 'divisi.edit') ? 'active' : '' }}">
                    <a href="{{ route('divisi.index') }}" class="menu-link">
                        <div data-i18n="Divisi">Divisi</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('jabatan.index', 'jabatan.create') ? 'active' : '' }}">
                    <a href="{{ route('jabatan.index') }}" class="menu-link">
                        <div data-i18n="Jabatan">Jabatan</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('category.index') ? 'active' : '' }}">
                    @can('kategori.view')
                        <a href="{{ route('category.index') }}" class="menu-link">
                            <div data-i18n="Kategori">Kategori</div>
                        </a>
                    @else
                        <a href="javascript:void(0)" class="menu-link">
                            <div data-i18n="Kategori">Kategori</div>
                        </a>
                    @endcan
                </li>
                <li class="menu-item {{ Route::is('statuses.index') ? 'active' : '' }}">
                    @can('status.view')
                        <a href="{{ route('statuses.index') }}" class="menu-link">
                            <div data-i18n="Status">Status</div>
                        </a>
                    @else
                        <a href="javascript:void(0)" class="menu-link">
                            <div data-i18n="Status">Status</div>
                        </a>
                    @endcan
                </li>
                <li class="menu-item {{ Route::is('kpi.index') ? 'active' : '' }}">
                    @can('kpi.view')
                        <a href="{{ route('kpi.index') }}" class="menu-link">
                            <div data-i18n="KPI">KPI</div>
                        </a>
                    @else
                        <a href="javascript:void(0)" class="menu-link">
                            <div data-i18n="KPI">KPI</div>
                        </a>
                    @endcan
                </li>
                <li
                    class="menu-item {{ Route::is('user.index', 'user.create', 'user.edit', 'user.password', 'user.role') ? 'active' : '' }}">
                    @can('user.view')
                        <a href="{{ route('user.index') }}" class="menu-link">
                            <div data-i18n="User">User</div>
                        </a>
                    @else
                        <a href="javascript:void(0)" class="menu-link">
                            <div data-i18n="User">User</div>
                        </a>
                    @endcan
                    </a>
                </li>
                <li class="menu-item {{ Route::is('jenisAset.index') ? 'active' : '' }}">
                    <a href="{{ route('jenisAset.index') }}" class="menu-link">
                        <div data-i18n="Jenis Aset">Jenis Aset</div>
                    </a>
                <li class="menu-item {{ Route::is('aset.create') ? 'active' : '' }}">
                    <a href="{{ route('aset.create') }}" class="menu-link">
                        <div data-i18n="Aset">Aset</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Main Menu -->
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Main Menu">Main Menu</span>
        </li>

        <!-- Layouts -->
        <li
            class="menu-item {{ Route::is('ticketing.index', 'ticketing.edit', 'service.index', 'service.create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-server"></i>
                <div data-i18n="Master Data">Master Data</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('ticketing.index', 'ticketing.edit') ? 'active' : '' }}">
                    <a href="{{ route('ticketing.index') }}" class="menu-link">
                        <div data-i18n="Request Ticketing">Request Ticketing</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('service.index', 'service.create') ? 'active' : '' }}">
                    <a href="{{ route('service.index') }}" class="menu-link">
                        <div data-i18n="Service Kendaraan">Service Kendaraan</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Report">Report</span>
        </li>

        <li class="menu-item {{ Route::is('ticketingit.reports', 'ticketinghr.reports') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-files"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>

            <ul class="menu-sub">
                @can('laporan.view')
                    <li class="menu-item {{ Route::is('ticketingit.reports') ? 'active' : '' }}">
                        <a href="{{ route('ticketingit.reports') }}" class="menu-link">
                            <div data-i18n="Tiketing IT">Tiketing IT</div>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="javascript:void(0)" class="menu-link">
                            <div data-i18n="Tiketing IT">Tiketing IT</div>
                        </a>
                    </li>
                @endcan
                <li class="menu-item {{ Route::is('ticketinghr.reports') ? 'active' : '' }}">
                    <a href="{{ route('ticketinghr.reports') }}" class="menu-link">
                        <div data-i18n="Tiketing HR">Tiketing HR</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Inventory">Inventory</span>
        </li>

        <li class="menu-item mb-6 {{ Route::is('aset.index') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-files"></i>
                <div data-i18n="Inventory">Inventory</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('aset.index') ? 'active' : '' }}">
                    <a href="{{ route('aset.index') }}" class="menu-link">
                        <div data-i18n="Aset">Aset</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Setting">Setting</span>
        </li>

        <li
            class="menu-item mb-6 {{ Route::is('ticketing.reports', 'role.index', 'role.edit', 'permission.index', 'permission.edit', 'role.permission', 'aset.generateQrcode') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ti ti-files"></i>
                <div data-i18n="Role & Permissions">Role & Permissions</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('role.index', 'role.edit', 'role.permission') ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}" class="menu-link">
                        <div data-i18n="Role">Role</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('permission.index', 'permission.edit') ? 'active' : '' }}">
                    <a href="{{ route('permission.index') }}" class="menu-link">
                        <div data-i18n="Permissions">Permissions</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('aset.generateQrcode') ? 'active' : '' }}">
                    <a href="{{ route('aset.generateQrcode') }}" class="menu-link">
                        <div data-i18n="Generate QRCode">Generate QRCode</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
