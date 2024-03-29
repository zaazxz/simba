<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>&rsaquo; SIMBA &rsaquo; Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('Logo SIMBA/Logo (2)/favicon-logo (2).png') }}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedcolumns/4.0.2/css/fixedColumns.dataTables.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('../backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../backend/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="container">
                    <a href="index.html" class="navbar-brand sidebar-gone-hide">
                        <img src="{{ asset('Logo SIMBA/Logo (2)/text-logo (2).png') }}" alt="" width="100px">
                    </a>
                    <div class="nav-collapse">
                        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                            <i class="fas fa-bars"></i>
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item active" id="listLaporan">
                                <a class="nav-link" href="#" id="btnLaporan" style="cursor: pointer">Laporan</a>
                            </li>
                            <li class="nav-item" id="listTentang">
                                <a class="nav-link" href="#" id="btnTentang" style="cursor: pointer">Tentang</a>
                            </li>
                        </ul>
                    </div>
                    <form class="form-inline ml-auto">
                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li>
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <a href="{{ route('home') }}"
                                            class="nav-link nav-link-lg nav-link-user">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="nav-link nav-link-lg nav-link-user">Log in</a>
                                    @endauth
                                </div>
                            @endif
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                </div>
            </nav>

            {{-- Main Content --}}
            <div class="main-content">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card p-3">
                            <img src="{{ asset('Logo SIMBA/Logo (2)/width-logo (2).png') }}" alt="Logo"
                                width="50%" class="mx-auto">
                        </div>
                    </div>
                </div>

                {{-- Section Laporan --}}
                <section class="section" id="sectionLaporan">

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total GTK</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $gtk }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>SD</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $sd }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>SMP</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $smp }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>SMK</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $smk }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        {{-- Bulanan --}}
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Grafik Kehadiran Guru Bulan Ini</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">
                                            @if ($sd_percentage->jadwal == 0)
                                                0%
                                            @else
                                                {{ round(($sd_percentage->hadir / $sd_percentage->jadwal) * 100) }}%
                                            @endif
                                        </div>
                                        <div class="font-weight-bold mb-1">SD Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;"
                                                data-width="
                                            @if ($sd_percentage->jadwal == 0) 0%
                                            @else
                                                {{ round(($sd_percentage->hadir / $sd_percentage->jadwal) * 100) }}% @endif
                                            ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">
                                            @if ($smp_percentage->jadwal == 0)
                                                0%
                                            @else
                                                {{ round(($smp_percentage->hadir / $smp_percentage->jadwal) * 100) }}%
                                            @endif
                                        </div>
                                        <div class="font-weight-bold mb-1">SMP Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;"
                                                data-width="
                                            @if ($smp_percentage->jadwal == 0) 0%
                                            @else
                                                {{ round(($smp_percentage->hadir / $smp_percentage->jadwal) * 100) }}% @endif
                                            ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">
                                            @if ($smk_percentage->jadwal == 0)
                                                0%
                                            @else
                                                {{ round(($smk_percentage->hadir / $smk_percentage->jadwal) * 100) }}%
                                            @endif
                                        </div>
                                        <div class="font-weight-bold mb-1">SMK Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;"
                                                data-width="
                                            @if ($smk_percentage->jadwal == 0) 0%
                                            @else
                                                {{ round(($smk_percentage->hadir / $smk_percentage->jadwal) * 100) }}% @endif
                                            ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Semester --}}
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Grafik Kehadiran Guru Semester ini</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">
                                            @if ($sd_percentage_all->jadwal == 0)
                                                0%
                                            @else
                                                {{ round(($sd_percentage_all->hadir / $sd_percentage_all->jadwal) * 100) }}%
                                            @endif
                                        </div>
                                        <div class="font-weight-bold mb-1">SD Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;"
                                                data-width="
                                            @if ($sd_percentage_all->jadwal == 0) 0%
                                            @else
                                                {{ round(($sd_percentage_all->hadir / $sd_percentage_all->jadwal) * 100) }}% @endif
                                            ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">
                                            @if ($smp_percentage_all->jadwal == 0)
                                                0%
                                            @else
                                                {{ round(($smp_percentage_all->hadir / $smp_percentage_all->jadwal) * 100) }}%
                                            @endif
                                        </div>
                                        <div class="font-weight-bold mb-1">SMP Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;"
                                                data-width="
                                            @if ($smp_percentage_all->jadwal == 0) 0%
                                            @else
                                                {{ round(($smp_percentage_all->hadir / $smp_percentage_all->jadwal) * 100) }}% @endif
                                            ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">
                                            @if ($smk_percentage_all->jadwal == 0)
                                                0%
                                            @else
                                                {{ round(($smk_percentage_all->hadir / $smk_percentage_all->jadwal) * 100) }}%
                                            @endif
                                        </div>
                                        <div class="font-weight-bold mb-1">SMK Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%;"
                                                data-width="
                                            @if ($smk_percentage_all->jadwal == 0) 0%
                                            @else
                                                {{ round(($smk_percentage_all->hadir / $smk_percentage_all->jadwal) * 100) }}% @endif
                                            ">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                {{-- Section About Us --}}
                <section class="section" id="sectionTentang" style="display: none;">

                    <div class="row">
                        <div class="col-12">
                            <div class="card p-3">
                                <p class="font-weight-bold text-primary pt-3 h6 mx-2">About us</p>
                                <hr>
                                <p>
                                    SIMBA (Sistem Presensi Informasi Bakti Nusantara) merupakan sebuah aplikasi berbasis
                                    website yang dibuat dengan tujuan monitoring atau memantau persentase Tenaga
                                    pendidik di SD, SMP, dan SMK Bakti Nusantara 666. SIMBA sudah terhubung dengan mesin
                                    fingerprint sehingga data absensi tenaga pendidik SD, SMP, dan SMK Bakti Nusantara
                                    666 sudah bisa di monitoring, di kelola, dan di presentasikan secara otomatis.
                                <div class="row mt-5">
                                    <div class="col-4 text-center">
                                        <img src="{{ asset('images/assets/Laravel.png') }}" width="50%">
                                    </div>
                                    <div class="col-4 text-center">
                                        <img src="{{ asset('images/assets/Bootstrap.png') }}" width="50%">
                                    </div>
                                    <div class="col-4 text-center">
                                        <img src="{{ asset('images/assets/JQuery.png') }}" width="50%">
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card p-3">
                                <p class="font-weight-bold text-primary pt-3 h6 mx-2 text-center">Developer</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        {{-- Developer Satu --}}
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="card p-3 bg-primary">
                                <div class="text-center pt-1 font-weight-bold">Mirza Qamaruzzaman</div>
                                <hr class="bg-white">
                                <img src="{{ asset('images/users/avatar-1.png') }}" alt="" width="150px"
                                    class="mx-auto rounded">
                                <ul class="list-group mt-3 text-dark">

                                    {{-- Email --}}
                                    <li class="list-group-item">
                                        <a href="mailto:mirzaqamaruzzaman18@gmail.com" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Hubungi Saya
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                    {{-- Github --}}
                                    <li class="list-group-item">
                                        <a href="https://github.com/zaazxz" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM277.3 415.7c-8.4 1.5-11.5-3.7-11.5-8 0-5.4.2-33 .2-55.3 0-15.6-5.2-25.5-11.3-30.7 37-4.1 76-9.2 76-73.1 0-18.2-6.5-27.3-17.1-39 1.7-4.3 7.4-22-1.7-45-13.9-4.3-45.7 17.9-45.7 17.9-13.2-3.7-27.5-5.6-41.6-5.6-14.1 0-28.4 1.9-41.6 5.6 0 0-31.8-22.2-45.7-17.9-9.1 22.9-3.5 40.6-1.7 45-10.6 11.7-15.6 20.8-15.6 39 0 63.6 37.3 69 74.3 73.1-4.8 4.3-9.1 11.7-10.6 22.3-9.5 4.3-33.8 11.7-48.3-13.9-9.1-15.8-25.5-17.1-25.5-17.1-16.2-.2-1.1 10.2-1.1 10.2 10.8 5 18.4 24.2 18.4 24.2 9.7 29.7 56.1 19.7 56.1 19.7 0 13.9.2 36.5.2 40.6 0 4.3-3 9.5-11.5 8-66-22.1-112.2-84.9-112.2-158.3 0-91.8 70.2-161.5 162-161.5S388 165.6 388 257.4c.1 73.4-44.7 136.3-110.7 158.3zm-98.1-61.1c-1.9.4-3.7-.4-3.9-1.7-.2-1.5 1.1-2.8 3-3.2 1.9-.2 3.7.6 3.9 1.9.3 1.3-1 2.6-3 3zm-9.5-.9c0 1.3-1.5 2.4-3.5 2.4-2.2.2-3.7-.9-3.7-2.4 0-1.3 1.5-2.4 3.5-2.4 1.9-.2 3.7.9 3.7 2.4zm-13.7-1.1c-.4 1.3-2.4 1.9-4.1 1.3-1.9-.4-3.2-1.9-2.8-3.2.4-1.3 2.4-1.9 4.1-1.5 2 .6 3.3 2.1 2.8 3.4zm-12.3-5.4c-.9 1.1-2.8.9-4.3-.6-1.5-1.3-1.9-3.2-.9-4.1.9-1.1 2.8-.9 4.3.6 1.3 1.3 1.8 3.3.9 4.1zm-9.1-9.1c-.9.6-2.6 0-3.7-1.5s-1.1-3.2 0-3.9c1.1-.9 2.8-.2 3.7 1.3 1.1 1.5 1.1 3.3 0 4.1zm-6.5-9.7c-.9.9-2.4.4-3.5-.6-1.1-1.3-1.3-2.8-.4-3.5.9-.9 2.4-.4 3.5.6 1.1 1.3 1.3 2.8.4 3.5zm-6.7-7.4c-.4.9-1.7 1.1-2.8.4-1.3-.6-1.9-1.7-1.5-2.6.4-.6 1.5-.9 2.8-.4 1.3.7 1.9 1.8 1.5 2.6z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Zaazxz
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                    {{-- Linkedin --}}
                                    <li class="list-group-item">
                                        <a href="https://linkedin.com/in/mirzaqamaruzzaman18" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Mirza Qamaruzzaman
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        {{-- Developer dua --}}
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="card p-3 bg-primary">
                                <div class="text-center pt-1 font-weight-bold">Aldy Andrian</div>
                                <hr class="bg-white">
                                <img src="{{ asset('images/users/avatar-1.png') }}" alt="" width="150px"
                                    class="mx-auto rounded">
                                <ul class="list-group mt-3 text-dark">

                                    {{-- Email --}}
                                    <li class="list-group-item">
                                        <a href="mailto:elennurlina43@gmail.com" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Hubungi Saya
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                    {{-- Github --}}
                                    <li class="list-group-item">
                                        <a href="https://github.com/Addy29" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM277.3 415.7c-8.4 1.5-11.5-3.7-11.5-8 0-5.4.2-33 .2-55.3 0-15.6-5.2-25.5-11.3-30.7 37-4.1 76-9.2 76-73.1 0-18.2-6.5-27.3-17.1-39 1.7-4.3 7.4-22-1.7-45-13.9-4.3-45.7 17.9-45.7 17.9-13.2-3.7-27.5-5.6-41.6-5.6-14.1 0-28.4 1.9-41.6 5.6 0 0-31.8-22.2-45.7-17.9-9.1 22.9-3.5 40.6-1.7 45-10.6 11.7-15.6 20.8-15.6 39 0 63.6 37.3 69 74.3 73.1-4.8 4.3-9.1 11.7-10.6 22.3-9.5 4.3-33.8 11.7-48.3-13.9-9.1-15.8-25.5-17.1-25.5-17.1-16.2-.2-1.1 10.2-1.1 10.2 10.8 5 18.4 24.2 18.4 24.2 9.7 29.7 56.1 19.7 56.1 19.7 0 13.9.2 36.5.2 40.6 0 4.3-3 9.5-11.5 8-66-22.1-112.2-84.9-112.2-158.3 0-91.8 70.2-161.5 162-161.5S388 165.6 388 257.4c.1 73.4-44.7 136.3-110.7 158.3zm-98.1-61.1c-1.9.4-3.7-.4-3.9-1.7-.2-1.5 1.1-2.8 3-3.2 1.9-.2 3.7.6 3.9 1.9.3 1.3-1 2.6-3 3zm-9.5-.9c0 1.3-1.5 2.4-3.5 2.4-2.2.2-3.7-.9-3.7-2.4 0-1.3 1.5-2.4 3.5-2.4 1.9-.2 3.7.9 3.7 2.4zm-13.7-1.1c-.4 1.3-2.4 1.9-4.1 1.3-1.9-.4-3.2-1.9-2.8-3.2.4-1.3 2.4-1.9 4.1-1.5 2 .6 3.3 2.1 2.8 3.4zm-12.3-5.4c-.9 1.1-2.8.9-4.3-.6-1.5-1.3-1.9-3.2-.9-4.1.9-1.1 2.8-.9 4.3.6 1.3 1.3 1.8 3.3.9 4.1zm-9.1-9.1c-.9.6-2.6 0-3.7-1.5s-1.1-3.2 0-3.9c1.1-.9 2.8-.2 3.7 1.3 1.1 1.5 1.1 3.3 0 4.1zm-6.5-9.7c-.9.9-2.4.4-3.5-.6-1.1-1.3-1.3-2.8-.4-3.5.9-.9 2.4-.4 3.5.6 1.1 1.3 1.3 2.8.4 3.5zm-6.7-7.4c-.4.9-1.7 1.1-2.8.4-1.3-.6-1.9-1.7-1.5-2.6.4-.6 1.5-.9 2.8-.4 1.3.7 1.9 1.8 1.5 2.6z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Addy29
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                    {{-- Linkedin --}}
                                    <li class="list-group-item">
                                        <a href="https://linkedin.com/in/aldy-andrian-454863267" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Aldy Andrian
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        {{-- Developer tiga --}}
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="card p-3 bg-primary">
                                <div class="text-center pt-1 font-weight-bold">Rio andrianto, S.kom., Gr</div>
                                <hr class="bg-white">
                                <img src="{{ asset('images/users/avatar-1.png') }}" alt="" width="150px"
                                    class="mx-auto rounded">
                                <ul class="list-group mt-3 text-dark">

                                    {{-- Email --}}
                                    <li class="list-group-item">
                                        <a href="mailto:r.andrianto@gmail.com" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Hubungi Saya
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                    {{-- Github --}}
                                    <li class="list-group-item">
                                        <a href="https://github.com/neushepa" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM277.3 415.7c-8.4 1.5-11.5-3.7-11.5-8 0-5.4.2-33 .2-55.3 0-15.6-5.2-25.5-11.3-30.7 37-4.1 76-9.2 76-73.1 0-18.2-6.5-27.3-17.1-39 1.7-4.3 7.4-22-1.7-45-13.9-4.3-45.7 17.9-45.7 17.9-13.2-3.7-27.5-5.6-41.6-5.6-14.1 0-28.4 1.9-41.6 5.6 0 0-31.8-22.2-45.7-17.9-9.1 22.9-3.5 40.6-1.7 45-10.6 11.7-15.6 20.8-15.6 39 0 63.6 37.3 69 74.3 73.1-4.8 4.3-9.1 11.7-10.6 22.3-9.5 4.3-33.8 11.7-48.3-13.9-9.1-15.8-25.5-17.1-25.5-17.1-16.2-.2-1.1 10.2-1.1 10.2 10.8 5 18.4 24.2 18.4 24.2 9.7 29.7 56.1 19.7 56.1 19.7 0 13.9.2 36.5.2 40.6 0 4.3-3 9.5-11.5 8-66-22.1-112.2-84.9-112.2-158.3 0-91.8 70.2-161.5 162-161.5S388 165.6 388 257.4c.1 73.4-44.7 136.3-110.7 158.3zm-98.1-61.1c-1.9.4-3.7-.4-3.9-1.7-.2-1.5 1.1-2.8 3-3.2 1.9-.2 3.7.6 3.9 1.9.3 1.3-1 2.6-3 3zm-9.5-.9c0 1.3-1.5 2.4-3.5 2.4-2.2.2-3.7-.9-3.7-2.4 0-1.3 1.5-2.4 3.5-2.4 1.9-.2 3.7.9 3.7 2.4zm-13.7-1.1c-.4 1.3-2.4 1.9-4.1 1.3-1.9-.4-3.2-1.9-2.8-3.2.4-1.3 2.4-1.9 4.1-1.5 2 .6 3.3 2.1 2.8 3.4zm-12.3-5.4c-.9 1.1-2.8.9-4.3-.6-1.5-1.3-1.9-3.2-.9-4.1.9-1.1 2.8-.9 4.3.6 1.3 1.3 1.8 3.3.9 4.1zm-9.1-9.1c-.9.6-2.6 0-3.7-1.5s-1.1-3.2 0-3.9c1.1-.9 2.8-.2 3.7 1.3 1.1 1.5 1.1 3.3 0 4.1zm-6.5-9.7c-.9.9-2.4.4-3.5-.6-1.1-1.3-1.3-2.8-.4-3.5.9-.9 2.4-.4 3.5.6 1.1 1.3 1.3 2.8.4 3.5zm-6.7-7.4c-.4.9-1.7 1.1-2.8.4-1.3-.6-1.9-1.7-1.5-2.6.4-.6 1.5-.9 2.8-.4 1.3.7 1.9 1.8 1.5 2.6z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Rio Andrianto
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                    {{-- Linkedin --}}
                                    <li class="list-group-item">
                                        <a href="https://linkedin.com/in/rioandrianto" target="_blank">
                                            <div class="row">

                                                {{-- SVG Logo --}}
                                                <div class="col-2 d-flex justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                                                    </svg>
                                                </div>

                                                {{-- Link --}}
                                                <div class="col-10 font-weight-bold">
                                                    : Rio Andrianto
                                                </div>

                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>

                    {{-- Ringkasan Aplikasi --}}
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <ul class="list-group">
                                    <li class="list-group-item active font-weight-bold text-center">SIMBA (Sistem
                                        Informasi Bakti Nusantara)</li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-6 text-center">Versi Mutakhir</div>
                                            <div class="col-6">: <span class="font-weight-bold">V{{ $latest_maintain->updateBesar }}.{{ $latest_maintain->updateKecil }}</span></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-6 text-center">Diupdate Pada</div>
                                            <div class="col-6">: <span class="font-weight-bold">{{ $latest_maintain->updatePada }}</span></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-6 text-center">Apa yang baru?</div>
                                            <div class="col-6">

                                                {{-- Modal Button Trigger --}}
                                                <button type="button" class="btn-block btn btn-primary"
                                                    data-toggle="modal" data-target="#ModalMaintenance">
                                                    Cek Disini!
                                                </button>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
            <footer class="main-footer">
                <div class="footer-right" id="footerLeftDashboard">
                    Copyright &copy; 2022 <div class="bullet"></div> Development By <a href="#">IoTech
                        Studio</a>
                </div>
                <div class="footer-left" id="footerRightDashboard">
                    Sistem Informasi Baknus (SIMBA) Ver 1.0.0
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalMaintenance" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mointenance Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="MaintenanceTable" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Versi</th>
                                    <th>Tanggal Update</th>
                                    <th>Apa yang baru?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_maintain as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>V{{ $data->updateBesar }}.{{ $data->updateKecil }}</td>
                                        <td>{{ $data->updatePada }}</td>
                                        <td>
                                            <button type="button" class="btn-block btn btn-primary"
                                                data-toggle="modal" data-target="#ModalWhatsNew{{ $data->id }}">
                                                Cek Disini!
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-3 pb-3">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @foreach ($data_maintain as $data)
        <div class="modal fade" id="ModalWhatsNew{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">What's New?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $data->updateFitur !!}
                    </div>
                    <div class="px-3 pb-3">
                        <button type="button" class="btn btn-secondary btn-block"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../backend/js/stisla.js"></script>

    <!-- Template JS File -->
    <script src="../backend/js/scripts.js"></script>
    <script src="../backend/js/custom.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>

    {{-- Jquery --}}
    <script>
        $(document).ready(function() {

            // Laporan
            $('#btnLaporan').click(function(e) {
                e.preventDefault();
                $('#sectionTentang').queue(function(next) {
                    $('#sectionTentang').fadeOut(2000);
                    $('#listTentang').toggleClass('active');
                    next()
                }).queue(function(next) {
                    $('#sectionLaporan').fadeIn(2000);
                    $('#listLaporan').toggleClass('active');
                    next();
                }).endQueue();
            });

            // Tentang
            $('#btnTentang').click(function(e) {
                e.preventDefault();
                $('#sectionLaporan').queue(function(next) {
                    $('#sectionLaporan').fadeOut(2000);
                    $('#listLaporan').toggleClass('active');
                    next()
                }).delay().queue(function(next) {
                    $('#sectionTentang').fadeIn(2000);
                    $('#listTentang').toggleClass('active');
                    next();
                }).endQueue();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#MaintenanceTable').DataTable();
        });
    </script>

</body>

</html>
