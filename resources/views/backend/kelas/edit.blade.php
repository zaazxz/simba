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
                    <div class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></div>
                    <div class="breadcrumb-item">Update Kelas Baru</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Update Kelas Baru</h2>
                <p class="section-lead">
                    Di halaman ini, Anda dapat mengubah Data Kelas baru.
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
                                            <label for="kelas">Nama Kelas</label>
                                            <input
                                                type="text"
                                                id="kelas"
                                                class="form-control @error('kelas') is-invalid @enderror"
                                                name="kelas"
                                                placeholder="Masukkan Nama Kelas"
                                                value="{{ old('kelas', $kelas->kelas) }}"
                                                required>
                                                @error('kelas')
                                                    {{ $message }}
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Unit</label>
                                            <select
                                            name="unit"
                                            id="unit"
                                            class="form-control @error('unit') is-invalid @enderror"
                                            required>
                                                <option value="{{ $kelas->unit }}">{{ $kelas->unit }}</option>
                                                <option value="SD Bakti Nusantara 666">SD Bakti Nusantara 666</option>
                                                <option value="SMP Bakti Nusantara 666">SMP Bakti Nusantara 666</option>
                                                <option value="SMK Bakti Nusantara 666">SMK Bakti Nusantara 666</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="km">Nama Ketua Murid</label>
                                            <input
                                                type="text"
                                                id="km"
                                                class="form-control @error('km') is-invalid @enderror"
                                                name="km"
                                                placeholder="Masukkan Nama km"
                                                value="{{ old('km', $kelas->km) }}"
                                                >
                                                @error('km')
                                                    {{ $message }}
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="km">No Telp Ketua Murid</label>
                                            <input
                                                type="number"
                                                id="telp_km"
                                                class="form-control @error('telp_km') is-invalid @enderror"
                                                name="telp_km"
                                                placeholder="Masukkan Nama Telp KM"
                                                value="{{ old('telp_km', $kelas->telp_km) }}"
                                                >
                                                @error('telp_km')
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
