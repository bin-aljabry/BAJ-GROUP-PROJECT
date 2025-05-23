<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('superadmin.companies.index') }}"
            class="nav-link {{ Route::is('superadmin.companies.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Companies
                <span class="badge badge-info right">{{ $companyCount }}</span>
            </p>
        </a>
    </li>

    <li class="nav-item">
        <a href=""
            class="nav-link {{ Route::is('superadmin.notification') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Notification
                <span class="badge badge-info right"></span>
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('superadmin.payments') }}"
            class="nav-link {{ Route::is('superadmin.payments') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Payment Status
                <span class="badge badge-info right"></span>
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.company.index') }}"
            class="nav-link {{ Route::is('admin.company.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Reports
                <span class="badge badge-info right"></span>
            </p>
        </a>
    </li>
