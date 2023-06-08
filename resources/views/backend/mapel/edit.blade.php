@extends('layouts.admin.app')
@section('title', 'Update Data Mapel')
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
                    <div class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Mata Pelajaran</a></div>
                    <div class="breadcrumb-item">Update Mapel Baru</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Update Mata Pelajaran</h2>
                <p class="section-lead">
                    Di halaman ini, Anda dapat mengubah Data Mapel baru.
                </p>

                <div class="card">
                    <div class="card-body">

                        <form class="form form-vertical" method="post" action="{{ $route }}">
                            @csrf
                            @method($method)
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="mapel">Nama Mata Pelajaran</label>
                                            <input
                                                type="text"
                                                id="mapel"
                                                class="form-control @error('mapel') is-invalid @enderror"
                                                name="mapel"
                                                placeholder="Masukkan Nama Mapel"
                                                value="{{ old('mapel', $mapel->mapel) }}"
                                                required>
                                                @error('mapel')
                                                    {{ $message }}
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="kode">Kode Mata Pelajaran</label>
                                            <input
                                                type="text"
                                                id="kode"
                                                class="form-control @error('kode') is-invalid @enderror"
                                                name="kode"
                                                placeholder="Masukkan Kode Mapel"
                                                value="{{ old('kode', $mapel->kode) }}"
                                                required>
                                                @error('kode')
                                                    {{ $message }}
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="beban">Beban Mata Pelajaran</label>
                                            <input
                                                type="number"
                                                id="beban"
                                                class="form-control @error('beban') is-invalid @enderror"
                                                name="beban"
                                                placeholder="Masukkan Beban Mapel"
                                                value="{{ old('beban', $mapel->beban) }}"
                                                required
                                                >
                                                @error('beban')
                                                    {{ $message }}
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
