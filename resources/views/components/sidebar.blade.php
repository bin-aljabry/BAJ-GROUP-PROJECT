<nav class="mt-2">
    @role('Super Admin')

    @include('./components/super-admin-sidebar')

    @endrole
        @role('admin')

        @include('./components/admin-sidebar')

        @endrole

        @role('Cashier')

        @include('./components/cashier-sidebar')

        @endrole

        @role('Teller')



        @endrole

        @role('Technician')


        @endrole
        @role('user')

        @include('./components/user-sidebar')

        @endrole


        <li>
            <a href="{{ route('admin.profile.edit') }}"
                class="nav-link {{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Profile</p>
            </a>
        </li>

    </ul>
</nav>
