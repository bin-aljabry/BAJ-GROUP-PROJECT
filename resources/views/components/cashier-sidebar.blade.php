<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Dashboard -->
    <li class="nav-item">
        <a href="{{ route('cashier.cashier.dashboard') }}" class="nav-link {{ Route::is('cashier.cashier.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <!-- Basic Settings -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
                Basic Setting
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('cashier.teller.list') }}" class="nav-link {{ Route::is('cashier.teller.list') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Teller</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.till.index') }}" class="nav-link {{ Route::is('cashier.till.index') ? 'active' : '' }}">
                    <i class="fas fa-store-alt nav-icon"></i>
                    <p>Till Number (Agent Code)</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.expenses_category.index') }}" class="nav-link {{ Route::is('cashier.expenses_category.index') ? 'active' : '' }}">
                    <i class="fas fa-tags nav-icon"></i>
                    <p>Expenses Category</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.income_category.index') }}" class="nav-link {{ Route::is('cashier.income_category.index') ? 'active' : '' }}">
                    <i class="fas fa-wallet nav-icon"></i>
                    <p>Income Category</p>
                </a>
            </li>
        </ul>
    </li>

    <!-- Capital -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-coins"></i>
            <p>
                Capital
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('cashier.teller.list') }}" class="nav-link">
                    <i class="fas fa-building nav-icon"></i>
                    <p>Branch Capital</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.till.index') }}" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Teller Capital</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.cash.index') }}" class="nav-link {{ Route::is('cashier.cash.index') ? 'active' : '' }}">
                    <i class="fas fa-money-bill-wave nav-icon"></i>
                    <p>Cash Capital</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.till.index') }}" class="nav-link">
                    <i class="fas fa-store nav-icon"></i>
                    <p>Till Capital</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.teller.list') }}" class="nav-link">
                    <i class="fas fa-university nav-icon"></i>
                    <p>Bank Capital</p>
                </a>
            </li>
        </ul>
    </li>

    <!-- Transactions -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('cashier.teller.list') }}" class="nav-link">
                    <i class="fas fa-store nav-icon"></i>
                    <p>Till Transaction</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.till.index') }}" class="nav-link">
                    <i class="fas fa-university nav-icon"></i>
                    <p>Bank Transaction</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.till.index') }}" class="nav-link">
                    <i class="fas fa-money-bill nav-icon"></i>
                    <p>Cash Transaction</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.float.index') }}" class="nav-link {{ Route::is('cashier.float.index') ? 'active' : '' }}">
                    <i class="fas fa-random nav-icon"></i>
                    <p>Float Transaction</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.teller.list') }}" class="nav-link">
                    <i class="fas fa-percent nav-icon"></i>
                    <p>Commission Transaction</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.teller.list') }}" class="nav-link">
                    <i class="fas fa-balance-scale nav-icon"></i>
                    <p>Transaction Balance</p>
                </a>
            </li>
        </ul>
    </li>

    <!-- Accounting -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calculator"></i>
            <p>
                Accounting
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('cashier.income.index') }}" class="nav-link {{ Route::is('cashier.income.index') ? 'active' : '' }}">
                    <i class="fas fa-arrow-circle-down nav-icon"></i>
                    <p>Income</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.expenses.index') }}" class="nav-link {{ Route::is('cashier.expenses.index') ? 'active' : '' }}">
                    <i class="fas fa-arrow-circle-up nav-icon"></i>
                    <p>Expenses</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.till.index') }}" class="nav-link">
                    <i class="fas fa-hand-holding-usd nav-icon"></i>
                    <p>Debt</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cashier.balance.index') }}" class="nav-link {{ Route::is('cashier.balance.index') ? 'active' : '' }}">
                    <i class="fas fa-balance-scale-left nav-icon"></i>
                    <p>General Balance</p>
                </a>
            </li>
        </ul>
    </li>

    <!-- Reports -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
                Reports
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Customer Report</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-file-invoice-dollar nav-icon"></i>
                    <p>Payment Report</p>
                </a>
            </li>
        </ul>
    </li>
