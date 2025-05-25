<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Dashboard -->
    <li class="nav-item">
        <a href="{{ route('superadmin.dashboard') }}" class="nav-link {{ Route::is('superadmin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <!-- Companies -->
    <li class="nav-item">
        <a href="{{ route('superadmin.companies.index') }}" class="nav-link {{ Route::is('superadmin.companies.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-building"></i>
            <p>Companies
                <span class="badge badge-info right">{{ $companyCount }}</span>
            </p>
        </a>
    </li>

    <!-- Packages -->
    <li class="nav-item">
        <a href="{{ route('superadmin.packages') }}" class="nav-link {{ Route::is('superadmin.packages') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box-open"></i>
            <p>Packages</p>
        </a>
    </li>

    <!-- Payments -->
    <li class="nav-item">
        <a href="{{ route('superadmin.payments') }}" class="nav-link {{ Route::is('superadmin.payments') ? 'active' : '' }}">
            <i class="nav-icon fas fa-credit-card"></i>
            <p>Payment Status</p>
        </a>
    </li>

    <!-- Notifications -->
    <li class="nav-item">
        <a href="{{ route('superadmin.notifications') }}" class="nav-link {{ Route::is('superadmin.notifications') ? 'active' : '' }}">
            <i class="nav-icon fas fa-bell"></i>
            <p>Notifications</p>
        </a>
    </li>

    <!-- Reports -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
                Reports
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <!-- Customer Report -->
            <li class="nav-item">
                <a href="{{ route('superadmin.reports.customers') }}" class="nav-link">
                    <i class="far fa-user nav-icon"></i>
                    <p>Customer Report</p>
                </a>
            </li>

            <!-- Payment Report -->
            <li class="nav-item">
                <a href="{{ route('superadmin.reports.payments') }}" class="nav-link">
                    <i class="far fa-money-bill-alt nav-icon"></i>
                    <p>Payment Report</p>
                </a>
            </li>
        </ul>
    </li>

 