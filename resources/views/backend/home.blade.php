@extends('layouts.admin.app')
@section('title', 'Simba Dashboard')
@section('content')
    <div class="main-content" style="min-height: 524px;">
        <section class="section">
            <div class="section-header">
                <h1>Sistem Informasi Presensi Bakti Nusantara 666</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Seluruh GTK</h4>
                            </div>
                            <div class="card-body">{{ $guru }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-comment"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Unit SMK</h4>
                            </div>
                            <div class="card-body">{{ $smk }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Unit SMP</h4>
                            </div>
                            <div class="card-body">{{ $smp }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Unit SD</h4>
                            </div>
                            <div class="card-body">{{ $sd }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- View Admin --}}
        @if (auth()->user()->role == 'Admin')
            {{-- Presensi Terkini --}}
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Presensi Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                {{-- Recent User --}}
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="{{ route('presensi.hadir') }}" class="btn btn-primary btn-lg btn-round">
                                    {{-- {{ $recents->links() }} --}}
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Belum Absen</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                {{-- Lokasi Favorite --}}
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="{{ route('presensi.konfirmasi') }}" class="btn btn-primary btn-lg btn-round">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Rekap Hari Ini --}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Rekap Hari Ini</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- View Guru --}}
        @elseif (auth()->user()->role == 'Guru')
            {{-- Persentase Kehadiran --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Kehadiran {{ Auth::user()->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                {{-- Grafik --}}
                                <div class="col-12">
                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">75%</div>
                                        <div class="font-weight-bold mb-1">Hadir</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar bg-success" role="progressbar" data-width="75%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 80%;"></div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="text-small float-right font-weight-bold text-muted">65%</div>
                                        <div class="font-weight-bold mb-1">Tidak Hadir</div>
                                        <div class="progress" data-height="3" style="height: 3px;">
                                            <div class="progress-bar bg-danger" role="progressbar" data-width="66%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 67%;"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">

                                {{-- Angka --}}
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-primary">
                                            <i class="far fa-newspaper"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Jadwal Per-Semester</h4>
                                            </div>
                                            <div class="card-body">{{ $guru }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-primary">
                                            <i class="far fa-newspaper"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Jadwal Terlaksana</h4>
                                            </div>
                                            <div class="card-body">{{ $guru }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-primary">
                                            <i class="far fa-newspaper"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Hadir</h4>
                                            </div>
                                            <div class="card-body">{{ $guru }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-primary">
                                            <i class="far fa-newspaper"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Tidak Hadir</h4>
                                            </div>
                                            <div class="card-body">{{ $guru }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection
