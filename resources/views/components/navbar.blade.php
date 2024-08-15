<nav  style="background-color: RGB(0, 122, 255)" class="main-header navbar navbar-expand navbar-{{ Auth::user()->mode }} navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"> </i> BIN AL JABRY OUTLETS </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <div class="user-panel mt-2 pb-2 mb-2 d-flex">
        <li class="nav-item">

            <div class="image">
            <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>

        </li>
        <br>
        <li class="nav-item">
            <div class="info">

               {{ Auth::user()->name }}
            </div>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                    <input type="submit" name="submit" value="Log out" class="btn btn-primary btn-sm">
                    {{-- <a :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a> --}}
                </form>
      </li>
        </div>
    </ul>
</nav>
