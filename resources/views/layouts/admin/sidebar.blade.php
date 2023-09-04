@php
    $url = Route::current()->getName();
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">

        {{-- Logo --}}
        <div class="sidebar-brand">
            <a href="/">
                <img src="{{ asset('Logo SIMBA/Logo (2)/main-logo (2).png') }}" alt="IPA" style="margin-top: 10px"
                    width="100px">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">R.A</a>
        </div>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fa-solid fa-border-all"></i> <span>Dashboard</span>
            </a>
            <ul class="sidebar-menu">

                {{-- Data Master --}}
                <li>
                <li
                    class="dropdown {{ str_contains($url, 'tatausaha') ||
                    str_contains($url, 'guru') ||
                    str_contains($url, 'jadwal') ||
                    str_contains($url, 'mapel') ||
                    str_contains($url, 'kelas')
                        ? 'show active'
                        : '' }}">
                    <a href="" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa-solid fa-bars"></i> <span>Data Master</span>
                    </a>
                    <ul class="dropdown-menu" style="display: none;">

                        @if (Auth::user()->role == 'Admin')
                            <li class="{{ str_contains($url, 'guru') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('guru.index') }}">Staff Pendidik</a>
                            </li>
                            <li class="{{ str_contains($url, 'tatausaha') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('tatausaha.index') }}">Tata Usaha</a>
                            </li>
                            <li class="{{ str_contains($url, 'mapel') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('mapel.index') }}">Mata Pelajaran</a>
                            </li>
                            <li class="{{ str_contains($url, 'kelas') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('kelas.index') }}">Kelas</a>
                            </li>
                        @endif

                        <li class="{{ str_contains($url, 'jadwal') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('jadwal.index') }}">Jadwal</a>
                        </li>
                    </ul>
                </li>
                </li>

                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Tata Usaha')
                    {{-- Presensi --}}
                    <li>
                    <li
                        class="dropdown {{ str_contains($url, 'kehadiran') || str_contains($url, 'konfirmasi') || str_contains($url, 'keseluruhan') || str_contains($url, 'bulanan') ? 'show active' : '' }}">
                        <a href="" class="nav-link has-dropdown">
                            <i class="fa-solid fa-person-chalkboard"></i> <span>Presensi</span>
                        </a>
                        <ul class="dropdown-menu" style="display: none;">
                            <li
                                class="{{ str_contains($url, 'keseluruhan') || str_contains($url, 'bulanan') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('presensi.keseluruhan') }}">Data Presensi</a>
                            </li>
                            <li class="{{ str_contains($url, 'hadir') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('presensi.hadir') }}">Kehadiran</a>
                            </li>
                            <li class="{{ str_contains($url, 'konfirmasi') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('presensi.konfirmasi') }}">Konfirmasi</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                @endif

                @if (Auth::user()->role == 'Admin')
                    {{-- Pesan --}}
                    <li>
                    <li
                        class="dropdown {{ str_contains($url, 'inbox') || str_contains($url, 'outbox') ? 'show active' : '' }}">
                        <a href="" class="nav-link has-dropdown">
                            <i class="fa-solid fa-envelope"></i> <span>Pesan</span>
                        </a>
                        <ul class="dropdown-menu" style="display: none;">
                            <li class="{{ str_contains($url, 'inbox') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('pesan.inbox') }}">Inbox</a>
                            </li>
                            <li class="{{ str_contains($url, 'outbox') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('pesan.outbox') }}">Outbox</a>
                            </li>
                        </ul>
                    </li>
                    </li>

                    {{-- Pengaturan --}}
                    <li>
                    <li
                        class="dropdown {{
                        str_contains($url, 'whatsapp') ||
                        str_contains($url, 'mesin') ||
                        str_contains($url, 'user') ||
                        str_contains($url, 'maintenance')
                            ? 'show active'
                            : '' }}">
                        <a href="" class="nav-link has-dropdown">
                            <i class="fa-solid fa-gear"></i> <span>Pengaturan</span>
                        </a>
                        <ul class="dropdown-menu" style="display: none;">
                            <li class="{{ str_contains($url, 'whatsapp') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('pengaturan.whatsapp.index') }}">Whatsapp
                                    Gateway</a>
                            </li>
                            <li class="{{ str_contains($url, 'mesin') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('pengaturan.mesin.index') }}">Mesin Fingerprint</a>
                            </li>
                            <li class="{{ str_contains($url, 'user') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('pengaturan.user.index') }}">Pengguna</a>
                            </li>
                            <li class="{{ str_contains($url, 'maintenance') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('pengaturan.maintenance.index') }}">Maintenance</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                @endif

                {{-- Dokumentasi --}}
                <li>
                <li
                    class="dropdown {{ (str_contains($url, 'operator') ? 'show active' : str_contains($url, 'umum')) ? 'show active' : '' }}">
                    <a href="" class="nav-link has-dropdown">
                        <i class="fa-solid fa-question"></i> <span>Dokumentasi</span>
                    </a>
                    <ul class="dropdown-menu" style="display: none;">
                        @if (Auth::user()->role == 'Admin')
                            <li class="{{ str_contains($url, 'operator') ? 'active' : '' }}"><a class="nav-link"
                                    href="">Panduan Admin</a></li>
                        @endif
                        <li class="{{ str_contains($url, 'umum') ? 'active' : '' }}"><a class="nav-link"
                                href="">Panduan User</a></li>
                    </ul>
                </li>
                </li>
                {{-- <li><a class="nav-link" href=""><i class="fas fa-cogs"></i> <span>Settings</span></a></li> --}}

            </ul>
    </aside>
</div>
