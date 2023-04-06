@extends('layouts.admin.app')
@section('title','Update Biodata')
@section ('content')
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
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Profil,{{ $pro->name }}</h2>
            <p class="section-lead">
                informasi tentang {{ $pro->name }} di halaman ini.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ (is_null($pro->photo)) ? '/assets/admin/img/avatar/avatar-1.png' : asset('images/users/'.$pro->photo) }}" class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $pro->role }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>{{ $pro->nik }}<div class="slash"></div>{{ $pro->name }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Hubungi {{ $pro->name }}</div>
                            <a href="mailto:{{ $pro->email }}?subject=Info Peduli Diri" target="_blank"><i class="fa fa-envelope"></i></a>
                            <a href="https://api.whatsapp.com/send?phone={{ $pro->phone }}&text=Salam%2C%20Peduli%20Diri...." target="_blank"><i class="fa fa-comments"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        {{-- <form> --}}
                            <div class="card-header">
                                <h4>Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'show') ? $pro->nik : '' }}" name="nik" readonly >
                                        <div class="invalid-feedback">
                                            Silahkan isi No. NIK Anda
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'show') ? $pro->name : '' }}" required name="name" readonly >
                                        <div class="invalid-feedback">
                                            Silahkan isi Nama Lengkap
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" value="{{ str_contains($url, 'show') ? $pro->email : '' }}" required="" name="email" readonly>
                                        </div>
                                        <div class="invalid-feedback">
                                            Silahkan isi Alamat Email Anda
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>No Ponsel</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control phone-number" name="phone" value="{{ str_contains($url, 'show') ? $pro->phone : '' }}" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control" readonly >
                                            <option value="{{ str_contains($url, 'show') ? $pro->gender : $pro->gender }}">{{ $pro->gender }}</option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input placeholder="Select date" type="date" id="dob" class="form-control" name="dob" value="{{ str_contains($url, 'show') ? $pro->dob : '' }}" readonly >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-location-arrow"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="address" value="{{ str_contains($url, 'show') ? $pro->address : '' }}" readonly >
                                        </div>
                                        <div class="invalid-feedback">
                                            Silahkan isi Alamat Lengkap Anda
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-control" required disabled >
                                            <option value="">Pilih provinsi...</option>
                                            @foreach ($provinces as $provinsi)
                                            <option value="{{ str_contains($url, 'show') ? $provinsi->code : '' }}" {{ old('provinsi', $pro->provinsi??'')==$provinsi->code?'selected':'' }}>{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Pilih Provinsi
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Kab/Kota</label>
                                        <select name="kabkota" id="kabupaten" class="form-control" disabled >
                                            <option value="{{ $pro->kabkota }}">{{ is_null ($pro->kabkota) ? 'Pilih Kelurahan' : $pro->getKabkota->name }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Isi Kab/Kota
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control" disabled >
                                            <option value="{{ $pro->kecamatan }}">{{ is_null ($pro->kecamatan) ? 'Pilih Kecamatan' : $pro->getkecamatan->name }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Isi Kecamatan
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Kelurahan</label>
                                        <select name="kelurahan" id="kelurahan" class="form-control" disabled >
                                            <option value="{{ $pro->kelurahan }}">{{ is_null ($pro->kelurahan) ? 'Pilih Kelurahan' : $pro->getkelurahan->name }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Isi kelurahan
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ url()->previous() }}"><button class="btn btn-primary">Kembali</button>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
    <script>
        $(function(){
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){
            $('#provinsi').on('change',function(){
                let id_provinsi = $('#provinsi').val();
                // console.log(id_provinsi);
                $.ajax({
                    type : "POST",
                    url : "{{ route('getkabupaten') }}",
                    data : {id_provinsi:id_provinsi},
                    cache : false,
                    success: function(msg){
                        $('#kabupaten').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                });
            })

            $('#kabupaten').on('change',function(){
                let id_kabupaten = $('#kabupaten').val();
                // console.log(id_provinsi);
                $.ajax({
                    type : "POST",
                    url : "{{ route('getkecamatan') }}",
                    data : {id_kabupaten:id_kabupaten},
                    cache : false,
                    success: function(msg){
                        $('#kecamatan').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                });
            })

            $('#kecamatan').on('change',function(){
                let id_kecamatan = $('#kecamatan').val();
                console.log(id_kecamatan);
                $.ajax({
                    type : "POST",
                    url : "{{ route('getkelurahan') }}",
                    data : {id_kecamatan:id_kecamatan},
                    cache : false,
                    success: function(msg){
                        $('#kelurahan').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                });
            })

        })




        });
    </script>
@endsection
