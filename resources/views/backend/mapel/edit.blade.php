@extends('layouts.admin.app')
@section('title','Edit Mapel')
@section ('content')
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
              <div class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Master Data</a></div>
              <div class="breadcrumb-item">Tambah Mata Pelajaran</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">{{$title}}</h2>
            <p class="section-lead">
              {{ $teks }}
            </p>

            <div class="card">
                <div class="card-body">

                    <form class="form form-vertical" method="GET" action="{{ $route }}">
                        @csrf
                        {{-- @method($method) --}}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="kode">Kode Mata Pelajaran</label>
                                        <input
                                            type="text"
                                            id="kode"
                                            class="form-control @error('code_mapel') is-invalid @enderror"
                                            name="code_mapel"
                                            placeholder="Masukkan Kode Mapel"
                                            value="{{ old('code_mapel', $mapels->code_mapel) }}"
                                            required>
                                            @error('code_mapel')
                                                {{ $message }}
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Mata Pelajaran</label>
                                        <input
                                            type="text"
                                            id="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            name="nama"
                                            placeholder="Masukkan"
                                            value="{{ old('nama', $mapels->nama) }}"
                                            autofocus>
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="unit">Kelas</label>
                                        <select
                                        class="form-control @error('kelas') is-invalid @enderror"
                                        name="kelas_id"
                                        id="kelas"
                                        required>
                                            <option value="{{ $mapels->kelas->id }}">{{ $mapels->kelas->nama }}</option>
                                            @foreach ($kelas as $classrooms)
                                                <option value="{{ $classrooms->id }}">{{ $classrooms->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="guru">Guru</label>
                                        <select
                                        class="form-control @error('guru') is-invalid @enderror"
                                        name="guru_id"
                                        id="guru"
                                        required>
                                            <option value="{{ $mapels->guru->id }}">{{ $mapels->guru->name }}</option>
                                            @foreach ($guru as $teachers)
                                                <option value="{{ $teachers->id }}">{{ $teachers->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="body">Keterangan</label>
                                        <input id="body" type="hidden" name="keterangan" value="{{ $mapels->keterangan }}">
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

                </div>
            </div>
            </form>
          </div>
        </section>
      </div>
@endsection
