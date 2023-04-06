@php
$url = Route::current()->getName();
@endphp
<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/" target="_blank"> <img width="75" src="{{ asset('backend/img/logo/baknus.png') }}" alt="IPA" style="margin-top: 10px"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">R.A</a>
          </div>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Dashboard
            </a>
                <ul class="sidebar-menu">
                    @if(Auth::user()->role == 'Admin')
                    <li>
                        <li class="dropdown {{ str_contains($url, 'tatausaha') ? 'show active' : str_contains($url, 'guru') ? 'show active' : '' }}">
                        <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i> <span>GTK</span></a>
                        <ul class="dropdown-menu" style="display: none;">
                            <li class={{ str_contains($url, 'guru') ? 'active' : '' }}><a class="nav-link" href="{{ route('guru.index') }}">Staff Pendidik</a></li>
                            <li class="{{ str_contains($url, 'tatausaha') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tatausaha.index') }}">Tata Usaha</a></li>
                        </ul>
                        </li>
                    </li>
                    @endif
                    <li>
                        <li class="dropdown {{ str_contains($url, 'jadwal') ? 'show active' : '' }}">
                        <a href="" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Jadwal</span></a>
                        <ul class="dropdown-menu" style="display: none;">
                            <li class="{{ str_contains($url, 'jadwal') ? 'active' : '' }}"><a class="nav-link" href="{{ route('jadwal.index') }}">Jadwal Guru</a></li>
                        </ul>
                        </li>
                    </li>

                    @if(Auth::user()->role == 'Admin')
                    <li>
                            <li class="dropdown {{ str_contains($url, 'category') ? 'show active' : str_contains($url, 'post') ? 'show active' : '' }}">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Presensi</span></a>
                            <ul class="dropdown-menu" style="display: none;">
                                <li class="{{ str_contains($url, 'category') ? 'active' : '' }}"><a class="nav-link" href="">Kehadiran</a></li>
                                <li class="{{ str_contains($url, 'post') ? 'active' : '' }}"><a class="nav-link" href="">Konfirmasi</a></li>
                            </ul>
                        </li>
                    </li>
                    @endif
                    <li>
                        <li class="dropdown {{ str_contains($url, 'operator') ? 'show active' : str_contains($url, 'umum') ? 'show active' : '' }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Dokumentasi</span></a>
                        <ul class="dropdown-menu" style="display: none;">
                            @if(Auth::user()->role == 'Admin')
                            <li class="{{ str_contains($url, 'operator') ? 'active' : '' }}"><a class="nav-link" href="">Panduan Admin</a></li>
                            @endif
                            <li class="{{ str_contains($url, 'umum') ? 'active' : '' }}"><a class="nav-link" href="">Panduan User</a></li>
                        </ul>
                    </li>
                </li>
                    {{-- <li><a class="nav-link" href=""><i class="fas fa-cogs"></i> <span>Settings</span></a></li> --}}

                </ul>
        </aside>
      </div>
