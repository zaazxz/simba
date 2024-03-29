<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (Auth::user()->photo)
                    <img src="{{ asset('images/users/' . Auth::user()->photo ) }}" alt="image" class="rounded-circle mr-1">
                @else
                    <img src="{{ asset('images/users/avatar-1.png') }}" alt="image" class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                <a

                @if (Auth::user()->role == 'Admin')
                    href = '{{ route('guru.show', ['code' => Auth::user()->code]) }}'
                @elseif (Auth::user()->role == 'Guru')
                    href = '{{ route('guru.show', ['code' => Auth::user()->code]) }}'
                @elseif (Auth::user()->role == 'Tata Usaha')
                    href = '{{ route('guru.show', ['code' => Auth::user()->code]) }}'
                @endif

                class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>

                @if (Auth::user()->role == 'Guru')
                <a href="{{ route('guru.changepassword', ['code' =>Auth::user()->code]) }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Change Password
                </a>
                @elseif (Auth::user()->role == 'Tata Usaha')
                <a href="{{ route('stu.changepassword', ['code' =>Auth::user()->code]) }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Change Password
                </a>
                @else
                <a href="{{ route('guru.changepassword', ['code' =>Auth::user()->code]) }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Change Password
                </a>
                @endif

                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
