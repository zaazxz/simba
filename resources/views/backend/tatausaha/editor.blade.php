@extends('layouts.admin.app')
@section('title','Update Data Tata Usaha')
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
                <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('tatausaha.index') }}">Tata Usaha</a></div>
                <div class="breadcrumb-item active">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Biodata GTK</h2>
            <p class="section-lead">
                Pada halaman ini anda dapat mengupdate data terbaru Guru dan Tenaga Kependidikan
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ (is_null($stafftu->photo)) ? '/assets/admin/img/avatar/avatar-1.png' : asset('images/users/'.$stafftu->photo) }}" class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $stafftu->name }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <p>
                                        {{ $stafftu->unit }}<br>NUPTK: {{ $stafftu->nuptk }}
                                    </p>
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Hubungi {{ $stafftu->name }}</div>
                            <a href="mailto:{{ $stafftu->email }}?subject=Info Baknus" target="_blank"><i class="fa fa-envelope"></i></a>
                            <a href="https://api.whatsapp.com/send?phone={{ $stafftu->phone }}&text=Salam%2C%20...." target="_blank"><i class="fa fa-comments"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="{{ $route }}" method="POST" multi-part enctype="multipart/form-data">
                            @csrf
                            @method($method)
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>UID</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $stafftu->uid : '' }}" name="uid">
                                        <div class="invalid-feedback">
                                            Hubungi Admin untuk informasi UID
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>NoReg Finger</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $stafftu->nirg : '' }}" required name="nirg" readonly>
                                        <div class="invalid-feedback">
                                            Hubungi Admin untuk informasi Nirg
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>NUPTK</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $stafftu->nuptk : '' }}" name="nuptk">
                                        <div class="invalid-feedback">
                                            Silahkan isi NUPTK
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $stafftu->name : '' }}" required name="name">
                                        <div class="invalid-feedback">
                                            Silahkan isi Nama Lengkap
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5 col-12">
                                        <label>Unit Induk</label>
                                        <select name="unit" id="unit" class="form-control">
                                            <option value="{{ str_contains($url, 'edit') ? $stafftu->unit : $stafftu->unit }}">{{ $stafftu->unit }}</option>
                                            <option>SD Bakti Nusantara 666</option>
                                            <option>SMP Bakti Nusantara 666</option>
                                            <option>SMK Bakti Nusantara 666</option>
                                            <option>YPDM Bakti Nusantara 666</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-7 col-12">
                                        <label>Unit Lainnya</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $stafftu->unit2 : '' }}" name="unit2">
                                        <div class="invalid-feedback">
                                            Silahkan nama instansi/sekolah jika mengajar di selain Sekolah Induk
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
                                            <input type="email" class="form-control" value="{{ str_contains($url, 'edit') ? $stafftu->email : '' }}" required="" name="email" readonly>
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
                                            <input type="text" class="form-control phone-number" name="notelp" value="{{ str_contains($url, 'edit') ? $stafftu->notelp : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>Jenis Kelamin</label>
                                        <select name="jk" id="gender" class="form-control">
                                            <option value="{{ str_contains($url, 'edit') ? $stafftu->jk : $stafftu->jk }}">{{ $stafftu->jk }}</option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Tempat Kelahiran</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $stafftu->pob : '' }}" required name="pob">
                                        <div class="invalid-feedback">
                                            Silahkan isi Tempat Kelahiran
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input placeholder="Select date" type="date" id="dob" class="form-control" name="dob" value="{{ str_contains($url, 'edit') ? $stafftu->dob : '' }}">
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
                                            <input type="text" class="form-control" name="alamat" value="{{ str_contains($url, 'edit') ? $stafftu->alamat : '' }}">
                                        </div>
                                        <div class="invalid-feedback">
                                            Silahkan isi Alamat Lengkap Anda
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-control" required>
                                            <option value="">Pilih provinsi...</option>
                                            @foreach ($provinces as $provinsi)
                                            <option value="{{ str_contains($url, 'edit') ? $provinsi->id : '' }}" {{ old('provinsi', $stafftu->provinsi??'')==$provinsi->id?'selected':'' }}>{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Pilih Provinsi
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Kab/Kota</label>
                                        <select name="kabkota" id="kabupaten" class="form-control">
                                            <option value="{{ $stafftu->kabkota }}">{{ is_null ($stafftu->kabkota) ? 'Pilih Kebupaten' : $stafftu->getKabkota->name}}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Isi Kab/Kota
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control">
                                            <option value="{{ $stafftu->kecamatan }}">{{ is_null ($stafftu->kecamatan) ? 'Pilih Kecamatan' : $stafftu->getkecamatan->name }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Isi Kecamatan
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Kelurahan</label>
                                        <select name="kelurahan" id="kelurahan" class="form-control">
                                            <option value="{{ $stafftu->kelurahan }}">{{ is_null ($stafftu->kelurahan) ? 'Pilih Kelurahan' : $stafftu->getkelurahan->name }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Isi kelurahan
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Photo</label>
                                        <input type="file" name="picture" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
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
