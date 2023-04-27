@extends('layouts.admin.app')
@section('title','Update Mata Pelajaran')
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
                <div class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Master Data</a></div>
                <div class="breadcrumb-item"><a href="#">Edit Mata Pelajaran</a></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">EDIT MATA PELAJARAN</h2>
            <p class="section-lead">
                Dihalaman ini anda dapat mengubah data mata pelajaran
            </p>

            <div class="card">
                <div class="card-body">
                        <form class="form form-vertical" method="post" action="">
                            @csrf
                            {{-- @method($method) --}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Kode Mata Pelajaran</label>
                                            <input type="number" id="first-name-vertical" class="form-control" name="nama"
                                                placeholder="Masukkan" value="{{ old('nama') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Mata Pelajaran</label>
                                            <input type="text" id="first-name-vertical" class="form-control" name="diskon"
                                                placeholder="Masukkan" value="{{ old('diskon') }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="body">Keterangan</label>
                                            <input id="body" type="hidden" name="body">
                                        <trix-editor input="body"></trix-editor>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                    </div>
                                </div>
                            </div>
                            </div>
                        </form>
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
