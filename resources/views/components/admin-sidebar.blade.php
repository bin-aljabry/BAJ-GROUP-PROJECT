<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Dashboard -->
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <!-- Basic Setting -->
    <li class="nav-item has-treeview {{ Route::is('admin.branch.list') || Route::is('admin.user.index') || Route::is('admin.role.index') || Route::is('admin.permission.index') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Route::is('admin.branch.list') || Route::is('admin.user.index') || Route::is('admin.role.index') || Route::is('admin.permission.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
                Basic Setting
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.branch.list') }}" class="nav-link {{ Route::is('admin.branch.list') ? 'active' : '' }}">
                    <i class="fas fa-code-branch nav-icon"></i>
                <p>Branch <span class="badge badge-primary right">{{ $BranchCount }}</span></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Users <span class="badge badge-info right">{{ $userCount }}</span></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.role.index') }}" class="nav-link {{ Route::is('admin.role.index') ? 'active' : '' }}">
                    <i class="fas fa-user-tag nav-icon"></i>
                    <p>Role <span class="badge badge-success right">{{ $RoleCount }}</span></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.permission.index') }}" class="nav-link {{ Route::is('admin.permission.index') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <p>Permission <span class="badge badge-danger right">{{ $PermissionCount }}</span></p>
                </a>
            </li>
             <li class="nav-item">
                <a href="{{ route('admin.permission.index') }}" class="nav-link {{ Route::is('admin.permission.index') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <p>Supplier <span class="badge badge-danger right">{{ $PermissionCount }}</span></p>
                </a>
            </li>
             <li class="nav-item">
                <a href="{{ route('admin.permission.index') }}" class="nav-link {{ Route::is('admin.permission.index') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <p>Float Exchanger <span class="badge badge-danger right">{{ $PermissionCount }}</span></p>
                </a>
            </li>
        </ul>
    </li>

    <!-- Stock Setting -->
    <li class="nav-item has-treeview {{ Route::is('admin.category.index') || Route::is('admin.subcategory.index') || Route::is('admin.collection.index') || Route::is('admin.product.index') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Route::is('admin.category.index') || Route::is('admin.subcategory.index') || Route::is('admin.collection.index') || Route::is('admin.product.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
                Stock Setting
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                    <i class="fas fa-folder nav-icon"></i>
                    <p>Category <span class="badge badge-warning right">{{ $CategoryCount }}</span></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.subcategory.index') }}" class="nav-link {{ Route::is('admin.subcategory.index') ? 'active' : '' }}">
                    <i class="fas fa-folder-open nav-icon"></i>
                    <p>Sub Category <span class="badge badge-secondary right">{{ $SubCategoryCount }}</span></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.collection.index') }}" class="nav-link {{ Route::is('admin.collection.index') ? 'active' : '' }}">
                    <i class="fas fa-archive nav-icon"></i>
                    <p>Collection <span class="badge badge-primary right">{{ $CollectionCount }}</span></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link {{ Route::is('admin.product.index') ? 'active' : '' }}">
                    <i class="fas fa-cube nav-icon"></i>
                    <p>Products <span class="badge badge-warning right">{{ $ProductCount }}</span></p>
                </a>
            </li>
        </ul>
    </li>

    <!-- Profile (umeandika "kasoro profile", kwa hiyo niliiacha hapa. Ukiihitaji na hiyo niambie) -->


<li class="nav-item has-treeview ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-coins"></i>
        <p>
            Capital
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>  Branch Capital</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-chart-pie nav-icon"></i>
                <p>All Tellers Capital</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p>All Till Capital</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p>All Bank Capital</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p>All cash Capital</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-coins"></i>
        <p>
            Stock Report
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>  Branch Available Stock</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-chart-pie nav-icon"></i>
                <p>Selling Report (Branch)</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p>Purchase Report(Branch)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p>Company Stock Report</p>
            </a>
        </li>


    </ul>
</li>

<li class="nav-item has-treeview ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-coins"></i>
        <p>
            Technical Report
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Branch Technical Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-chart-pie nav-icon"></i>
                <p>Branch Tech Analysis</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p>Company Tech Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p>Company Tech Analysis</p>
            </a>
        </li>


    </ul>
</li>
<li class="nav-item has-treeview ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-calculator"></i>
        <p>
            Accounting
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-balance-scale nav-icon"></i>
                <p>Summary (Branch Wise)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-exchange-alt nav-icon"></i>
                <p>Income vs Expenses</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-coins"></i>
        <p>
        Transaction Report
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Branch  Report</p>
            </a>
        </li>

<li class="nav-item">
    <a href="" class="nav-link ">
        <i class="nav-icon fas fa-money-check-alt"></i>
        <p>
            Teller Reports
            <span class="badge badge-info right">{{ $transactionCount ?? 0 }}</span>
        </p>
    </a>
</li>

   <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Till  Report</p>
            </a>
        </li>

           <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Bank  Report</p>
            </a>
        </li>

           <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Cash  Report</p>
            </a>
        </li>
    </ul>


<li class="nav-item has-treeview ">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-coins"></i>
        <p>
            Float Exchange
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>  Branch Float Exchanger</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p> Till Float Exchanger</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p> Bank Float Exchanger</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-eye nav-icon"></i>
                <p> Cash  Exchanger</p>
            </a>
        </li>
    </ul>
</li>
