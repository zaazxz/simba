@extends('layouts.admin.app')
@section('title','Update Data Kelas')
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
                <div class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Informasi Kelas</h2>
            <p class="section-lead">
                Pada halaman ini anda dapat mengupdate data terbaru Informasi Kelas
            </p>

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
