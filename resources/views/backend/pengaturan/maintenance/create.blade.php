@extends('layouts.admin.app')
@section('title', 'Update Versi Aplikasi')

@section('css')
    <style>
        /* Trix Editor */
        div .trix-button-row {
            display: flex;
            justify-content: center;
        }

        /* Broken Line */
        .trix-button-group-spacer,
        .trix-button-group--history-tools,
        .trix-button-group--file-tools {
            display: none;
            opacity: 0%;
        }

        /* Button */
        .trix-button--icon-undo,
        .trix-button--icon-redo,
        .trix-button--icon-attach,
        .trix-button--icon-increase-nesting-level,
        .trix-button--icon-decrease-nesting-level,
        .trix-button--icon-code,
        .trix-button--icon-quote,
        .trix-button--icon-link {
            display: none;
        }

        /* Input Type Number */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        ;
    </style>
@endsection

@section('content')
    @php
        $url = Route::current()->getName();
    @endphp
    <div class="main-content" style="min-height: 555px;">
        <section class="section">

            {{-- Section Header --}}
            <div class="section-header">
                <h1> {{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Maintenance Website</div>
                </div>
            </div>

            {{-- Section Main --}}
            <div class="section-body">

                {{-- Text Banner --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card pt-3 pb-2 bg-primary">
                            <h3 class="text-center text-primary text-light">Update Versi Website SIMBA</h3>
                        </div>
                    </div>
                </div>

                {{-- Pengaturan --}}
                <div class="row">

                    {{-- Announce --}}
                    <div class="col-lg-6 col-md-12">

                        <div class="card">

                            {{-- Text --}}
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <p class="text-center text-primary font-weight-bold my-0 py-0">Baca Sebelum Memperbarui
                                        Status Aplikasi!</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12">
                                    <p class="text-muted mx-2 mb-1">
                                        Tekan tombol status update aplikasi untuk menentukan status update aplikasi. Status
                                        update besar untuk perubahan aplikasi secara signifikan <span
                                            class="text-primary font-weight-bold">(Penambahan atau pengurangan
                                            fitur)</span>. Status update kecil untuk perubahan aplikasi non signifikian
                                        <span class="text-primary font-weight-bold">(Perubahan atau Perbaikan Fitur)</span>.
                                        Pilih dengan baik status update aplikasi. Pastikan form status tidak berwarna <span class="text-danger font-weight-bold">merah!</span>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Tombol --}}
                    <div class="col-lg-6 col-md-12">

                        <div class="card">

                            {{-- Text --}}
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <p class="text-center text-primary font-weight-bold my-0 py-0">Tombol Status Update
                                        Versi</p>
                                </div>
                            </div>

                            <hr>

                            {{-- Select Status Maintenance --}}
                            <div class="row" style="height: 145px;">
                                <div class="col-6" style="margin-top: 30px;">
                                    <div class="selectgroup selectgroup-pills d-flex justify-content-center my-2 pb-2">
                                        <label for="" class="mt-2 mr-2">Update Besar</label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="icon-input" id="bigUpdateButton" value="1"
                                                class="selectgroup-input radio-status">
                                            <span class="selectgroup-button selectgroup-button-icon"><i
                                                    class="fa-solid fa-file-pen ml-1"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6" style="margin-top: 30px;">
                                    <div class="selectgroup selectgroup-pills d-flex justify-content-center my-2 pb-2">
                                        <label for="" class="mt-2 mr-2">Update Kecil</label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="icon-input" id="smallUpdateButton" value="2"
                                                class="selectgroup-input radio-status">
                                            <span class="selectgroup-button selectgroup-button-icon"><i
                                                    class="fa-solid fa-file-pen ml-1"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Form --}}
                <form action="" id="nonUpdate">

                    {{-- Form --}}
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">

                                {{-- Text --}}
                                <div class="row">
                                    <div class="col-12 pt-3">
                                        <p class="text-muted text-center my-0 py-0">Detail Fitur Update Versi</p>
                                    </div>
                                </div>

                                <hr>

                                <p class="text-center">Detail Fitur Baru / Diubah / Dihapus</p>

                                {{-- Input Trix Editor --}}
                                <input id="x" type="hidden" name="content">
                                <trix-editor input="x" style="height: 275px;"></trix-editor>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">

                                {{-- Text --}}
                                <div class="row">
                                    <div class="col-12 pt-3">
                                        <p class="text-muted text-center my-0 py-0">Status Update Versi</p>
                                    </div>
                                </div>

                                <hr>

                                {{-- Before Checked --}}
                                <div id="beforeChecked">
                                    {{-- Before Checked Radio --}}
                                    <div class="row">
                                        <div class="col-12" style="height: 350px"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Button --}}
                    <button class="btn btn-block btn-primary">
                        Simpan
                    </button>

                </form>

                {{-- Form Big Update --}}
                <form action="{{ route('pengaturan.maintenance.bigupdate.store') }}" method="POST" id="bigUpdate" style="display: none;">

                    @csrf

                    {{-- Form --}}
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">

                                {{-- Text --}}
                                <div class="row">
                                    <div class="col-12 pt-3">
                                        <p class="text-muted text-center my-0 py-0">Detail Fitur Update Versi</p>
                                    </div>
                                </div>

                                <hr>

                                <p class="text-center">Detail Fitur Baru / Diubah / Dihapus</p>

                                {{-- Input Trix Editor --}}
                                <input id="updateFitur" type="hidden" name="updateFitur">
                                <trix-editor input="updateFitur" style="height: 275px;"></trix-editor>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">

                                {{-- Text --}}
                                <div class="row">
                                    <div class="col-12 pt-3">
                                        <p class="text-muted text-center my-0 py-0">Status Update Versi</p>
                                    </div>
                                </div>

                                <hr>

                                {{-- Big Update --}}
                                <div>
                                    {{-- Setting Maintaining Status Versi Besar --}}
                                    <div class="row pt-4 pb-5">

                                        {{-- Update Besar --}}
                                        <div class="col-6 px-4">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center" for="updateBesar">Update Besar</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-file-pen ml-1"></i>
                                                        </div>
                                                    </div>
                                                    <input
                                                    type="number"
                                                    class="form-control phone-number updateBesar"
                                                    id="updateBesar"
                                                    name="updateBesar"
                                                    required>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Update Kecil --}}
                                        <div class="col-6 px-4">
                                            <div class="form-group">
                                                <label class="d-flex justify-content-center" for="updateKecil">Update Kecil</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-file-pen ml-1"></i>
                                                        </div>
                                                    </div>
                                                    <input
                                                    type="number"
                                                    class="form-control phone-number"
                                                    id="updateKecil"
                                                    placeholder="00"
                                                    value="00"
                                                    name="updateKecil"
                                                    disabled>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Diupdate Oleh --}}
                                        <div class="col-12 px-4">
                                            <div class="form-group">
                                                <label for="updateOleh">Update Versi Website Oleh</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="updateOleh"
                                                    name="updateOleh"
                                                    placeholder="{{ Auth::user()->name }}"
                                                    disabled>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Diupdate Pada --}}
                                        <div class="col-12 px-4">
                                            <div class="form-group">
                                                <label for="updatePada">Update Versi Website Pada</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                        </div>
                                                    </div>
                                                    <input
                                                    type="text"
                                                    class="form-control datepicker"
                                                    placeholder="{{ $waktu }}"
                                                    id="updatePada"
                                                    name="updatePada"
                                                    disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Button --}}
                    <button class="btn btn-block btn-primary" type="submit">
                        Simpan
                    </button>

                </form>

                {{-- Form Small Update --}}
                <form action="{{ route('pengaturan.maintenance.smallupdate.store') }}" method="POST" id="smallUpdate" style="display: none;">

                    @csrf

                    {{-- Form --}}
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">

                                {{-- Text --}}
                                <div class="row">
                                    <div class="col-12 pt-3">
                                        <p class="text-muted text-center my-0 py-0">Detail Fitur Update Versi</p>
                                    </div>
                                </div>

                                <hr>

                                <p class="text-center">Detail Fitur Baru / Diubah / Dihapus</p>

                                {{-- Input Trix Editor --}}
                                <input id="updateFiturKecil" type="hidden" name="updateFiturKecil">
                                <trix-editor input="updateFiturKecil" style="height: 275px;"></trix-editor>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">

                                {{-- Text --}}
                                <div class="row">
                                    <div class="col-12 pt-3">
                                        <p class="text-muted text-center my-0 py-0">Status Update Versi</p>
                                    </div>
                                </div>

                                <hr>

                                {{-- Small Update --}}
                                <div id="smallUpdateContainer">
                                    {{-- Setting Maintaining Status Versi Kecil --}}
                                    <div class="row pt-4 pb-5">

                                        {{-- Update Kecil --}}
                                        <div class="col-12 px-4">
                                            <div class="form-group">
                                                <label for="updateKecil">Update Kecil</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-file-pen ml-1"></i>
                                                        </div>
                                                    </div>
                                                    <input
                                                    type="number"
                                                    class="form-control phone-number updateKecil"
                                                    id="updateKecil"
                                                    name="updateKecil"
                                                    required>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Diupdate Oleh --}}
                                        <div class="col-12 px-4">
                                            <div class="form-group">
                                                <label>Update Versi Website Oleh</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ Auth::user()->name }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Diupdate Pada --}}
                                        <div class="col-12 px-4">
                                            <div class="form-group">
                                                <label>Update Versi Website Pada</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control datepicker"
                                                        placeholder="{{ $waktu }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Button --}}
                    <button class="btn btn-block btn-primary">
                        Simpan
                    </button>

                </form>

            </div>

        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#bigUpdateButton').on('change', function() {

                // set display before check to none
                $('#nonUpdate').css('display', 'none');

                // Change display small update to "none" if set
                if ($('#smallUpdate').css('display', '')) {

                    // Turn Display to none
                    $('#smallUpdate').css('display', 'none');

                    // Change display big update
                    $('#bigUpdate').css('display', '');

                } else {

                    // Change display big update
                    $('#bigUpdate').css('display', '');

                }

            });

            $('#smallUpdateButton').on('change', function() {

                // set display before check to none
                $('#nonUpdate').css('display', 'none');

                // Change display big update to "none" if set
                if ($('#bigUpdate').css('display', '')) {

                    // Turn Display to none
                    $('#bigUpdate').css('display', 'none');

                    // Change display big update
                    $('#smallUpdate').css('display', '');

                } else {

                    // Change display big update
                    $('#smallUpdate').css('display', '');

                }

            });

            // Ajax
            $.ajax({
                url: '{{ route('getvaluebigupdate') }}',
                method: 'GET',
                success: function(data) {

                    console.log(data)

                    // Change On Big Update
                    $('.updateBesar').on('input', function() {
                        if (data.updateBesar >= $('.updateBesar').val()) {
                            $('.updateBesar').removeClass('text-success');
                            $('.updateBesar').addClass('is-invalid');
                        } else {
                            $('.updateBesar').removeClass('is-invalid');
                            $('.updateBesar').addClass('text-success');
                        }

                        console.log($('.updateBesar').val());
                    });

                    // Change
                    $('.updateKecil').on('input', function() {
                        if (data.updateKecil >= $('.updateKecil').val()) {
                            $('.updateKecil').removeClass('text-success');
                            $('.updateKecil').addClass('is-invalid');
                        } else {
                            $('.updateKecil').removeClass('is-invalid');
                            $('.updateKecil').addClass('text-success');
                        }

                        console.log($('.updateBesar').val());
                    });

                },
                error: function(e) {
                    response.text(e);
                }
            });



        });
    </script>
@endsection
