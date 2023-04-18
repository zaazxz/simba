@extends('layouts.admin.app')
@section('title','Simba Dashboard')
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
        @if (auth()->user()->role=='Admin')
        {{-- Perjalanan Terkini --}}
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
                      <a href="" class="btn btn-primary btn-lg btn-round">
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
                    <a href="#" class="btn btn-primary btn-lg btn-round">
                      Lihat Semua
                    </a>
                  </div>
                </div>
              </div>
            </div>
        </div>
        {{-- Tulisan Terakhir --}}
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
      <!-- Main Content -->
        @else
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Lokasi Favourite</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    {{-- <img class="mr-3 rounded-circle" width="50" src="assets/admin/img/avatar/avatar-1.png" alt="avatar"> --}}
                    {{-- @foreach($top as $tp)
                    <li class="media" >

                      <div class="media-body">
                        <div class="float-right text-primary">{{ $tp->amount }} Kunjungan</div>
                        <div class="media-title"></div>
                        <i class="fa fa-suitcase"></i> <span class="text-small text-muted"> {{ $tp->nama_lokasi }}</span>
                      </div>
                    </li>
                    @endforeach --}}
                </ul>
                <div class="text-center pt-1 pb-1">
                  {{-- <a href="#" class="btn btn-primary btn-lg btn-round">
                    View All
                  </a> --}}
                </div>
              </div>
            </div>
          </div>
        @endif
      @endsection
