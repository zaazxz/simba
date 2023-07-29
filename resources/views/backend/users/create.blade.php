@extends('layouts.admin.app')
@section('title', 'Input Baru Data GTK')
@section('content')
    @php
        $url = Route::current()->getName();
    @endphp
    <div class="main-content" style="min-height: 524px;">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Kembali</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('guru.index') }}">GTK</a></div>
                    <div class="breadcrumb-item">Input GTK Baru</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Input GTK Baru</h2>
                <p class="section-lead">
                    Di halaman ini, Anda dapat menambahkan Data GTK baru.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ $route }}" method="POST">
                                @csrf
                                @method($method)
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama
                                            Lengkap</label>
                                        <div class="col-sm-12 col-md-4">
                                            <input type="text" name="name" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Email</label>
                                        <div class="col-sm-12 col-md-4">
                                            <input type="text" name="email" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">jabatan</label>
                                        <div class="col-sm-12 col-md-4">
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="">Pilih Jabatan</option>
                                                @if (Auth::user()->role == 'Admin')
                                                    <option value="Staff Pimpinan">Staff Pimpinan</option>
                                                @endif
                                                <option value="Guru">Guru</option>
                                                <option value="Tata Usaha">Tata Usaha</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Unit
                                            Induk</label>
                                        <div class="col-sm-12 col-md-4">
                                            <select name="unit" id="unit" class="form-control" required>
                                                <option value="">Pilih Unit Induk</option>
                                                <option>SD Bakti Nusantara 666</option>
                                                <option>SMP Bakti Nusantara 666</option>
                                                <option>SMK Bakti Nusantara 666</option>
                                                <option>YPDM Bakti Nusantara 666</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Simpan </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>
@endsection
