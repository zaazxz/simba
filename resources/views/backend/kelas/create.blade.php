@extends('layouts.admin.app')
@section('title', 'Tambah Data Kelas')
@section('content')
    @php
        $url = Route::current()->getName();
    @endphp

    <div class="main-content" style="min-height: 554px;">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Kembali</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></div>
                    <div class="breadcrumb-item active">Tambah</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Tambah Kelas</h2>
                <p class="section-lead">
                    Pada halaman ini anda dapat mengupdate data terbaru Informasi Kelas
                </p>

                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" method="POST" action="{{ route('kelas.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="nama">Nama Kelas</label>
                                            <input
                                            type="text"
                                            id="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            name="nama"
                                            placeholder="Masukkan Nama Kelas"
                                            value="{{ old('nama') }}"
                                            autofocus
                                            required>
                                        </div>
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Ketua Murid</label>
                                            <input
                                            type="text"
                                            id="first-name-vertical"
                                            class="form-control @error('km') is-invalid @enderror"
                                            name="km"
                                            placeholder="Masukkan Nama Ketua Murid"
                                            value="{{ old('km') }}"
                                            autofocus>
                                        </div>
                                        @error('km')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nomor Telepon ketua Murid</label>
                                            <input
                                            type="text"
                                            id="first-name-vertical"
                                            class="form-control @error('telp_km') is-invalid @enderror"
                                            name="telp_km"
                                            placeholder="Masukkan No Telp Ketua Murid"
                                            value="{{ old('telp_km') }}"
                                            autofocus>
                                        </div>
                                        @error('telp_km')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="unit">Unit</label>
                                            <select
                                            class="form-control @error('unit') is-invalid @enderror"
                                            name="unit"
                                            id="unit"
                                            required>
                                                <option value="">Pilih Unit...</option>
                                                <option value="SD Bakti Nusantara 666">SD Bakti Nusantara 666</option>
                                                <option value="SMP Bakti Nusantara 666">SMP Bakti Nusantara 666</option>
                                                <option value="SMK Bakti Nusantara 666">SMK Bakti Nusantara 666</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Jurusan</label>
                                            <input
                                            type="text"
                                            id="first-name-vertical"
                                            class="form-control @error('jurusan') is-invalid @enderror"
                                            name="jurusan"
                                            placeholder="Masukkan Jurusan"
                                            value="{{ old('jurusan') }}"
                                            autofocus>
                                        </div>
                                        @error('jurusan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Wali Kelas</label>
                                            <select
                                            class="form-control @error('walikelas_id') is-invalid @enderror"
                                            id="wakel"
                                            name="walikelas_id"
                                            required>
                                                <option value="">Pilih Guru...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block">Simpan</button>
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

@section('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $('#unit').on('change', function() {
                    let unit = $('#unit').val();
                    console.log(unit);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('getwakel') }}",
                        data: {unit:unit},
                        cache: false,
                        success: function(msg) {
                            $('#wakel').html(msg);
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    });
                })
            });

        });
    </script>
@endsection
