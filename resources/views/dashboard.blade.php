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

    <!-- CSS Libraries -->

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
                            <img src="{{ asset('Logo SIMBA/Logo (2)/width-logo (2).png') }}" alt="Logo" width="50%"
                                class="mx-auto">
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
                                        140
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>SD</h4>
                                    </div>
                                    <div class="card-body">
                                        34
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>SMP</h4>
                                    </div>
                                    <div class="card-body">
                                        42
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>SMK</h4>
                                    </div>
                                    <div class="card-body">
                                        84
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Grafik Kehadiran Guru Hari Ini</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">75%</div>
                                        <div class="font-weight-bold mb-1">SD Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" data-width="75%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 80%;"></div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">65%</div>
                                        <div class="font-weight-bold mb-1">SMP Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" data-width="66%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 67%;"></div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">70%</div>
                                        <div class="font-weight-bold mb-1">SMK Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" data-width="70%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 58%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Grafik Kehadiran Guru Minggu ini</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">98%</div>
                                        <div class="font-weight-bold mb-1">SD Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" data-width="98%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 80%;"></div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">100%</div>
                                        <div class="font-weight-bold mb-1">SMP Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" data-width="100%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 67%;"></div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">80%</div>
                                        <div class="font-weight-bold mb-1">SMK Bakti Nusantara 666</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar" role="progressbar" data-width="80%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 58%;"></div>
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
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit qui voluptas voluptates
                                    exercitationem, necessitatibus optio! Dolore quis atque, velit non voluptas eos
                                    dicta, eveniet saepe deleniti ex suscipit ratione voluptates! Aperiam corporis
                                    officiis impedit deleniti amet, odit voluptatum. Aliquid temporibus blanditiis rem,
                                    assumenda sunt vitae repudiandae, quas ratione illo, odio eius dolorem quae ullam
                                    quam vel ea quaerat eum explicabo dignissimos quis voluptatem quo earum dolore?
                                    Dignissimos, ipsam nihil ducimus asperiores atque voluptatum maiores eveniet
                                    doloremque voluptates ea sunt dicta earum magnam. Quam ipsa laboriosam et soluta
                                    labore natus quod veritatis, libero quae, officia distinctio commodi aliquam culpa
                                    perferendis ipsam.</p>
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
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card p-3 bg-primary">
                                <div class="text-center pt-1 font-weight-bold">Mirza Qamaruzzaman</div>
                                <hr class="bg-white">
                                <img src="{{ asset('images/users/avatar-1.png') }}" alt=""
                                    width="150px" class="mx-auto rounded">
                                <ul class="list-group mt-3 text-dark">

                                    {{-- Email --}}
                                    <li class="list-group-item">
                                        <a href="#" target="_blank">
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
                                                    : mirzaqamaruzzaman18@gmail.com
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

                        {{-- Developer Dua --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card p-3 bg-primary">
                                <div class="text-center pt-1 font-weight-bold">Mirza Qamaruzzaman</div>
                                <hr class="bg-white">
                                <img src="{{ asset('images/users/avatar-1.png') }}" alt=""
                                    width="150px" class="mx-auto rounded">
                                <ul class="list-group mt-3 text-dark">

                                    {{-- Email --}}
                                    <li class="list-group-item">
                                        <a href="#" target="_blank">
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
                                                    : mirzaqamaruzzaman18@gmail.com
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

                    </div>

                    {{-- Developer Lain --}}
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block font-weight-bold">Lihat Developer Lainnya</button>
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
                                            <div class="col-6">: <span class="font-weight-bold">v1.0</span></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-6 text-center">Diupdate Pada</div>
                                            <div class="col-6">: <span class="font-weight-bold">20 Januari 2019</span></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-6 text-center">Apa yang baru?</div>
                                            <div class="col-6">
                                                <button class="btn-block btn btn-primary">Cek disini!</button>
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

    {{-- Jquery --}}
    <script>
        $(document).ready(function () {

            // Laporan
            $('#btnLaporan').click(function (e) {
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
            $('#btnTentang').click(function (e) {
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

</body>

</html>
