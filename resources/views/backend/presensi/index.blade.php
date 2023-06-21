@extends('layouts.admin.app')
@section('title', 'Presensi Kehadiran')
@section('content')
    @php
        $url = Route::current()->getName();
    @endphp
    <div class="main-content" style="min-height: 555px;">
        <section class="section">
            <div class="section-header">
                <h1> {{ $title }} </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kehadiran</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'hadir') ? 'active' : '' }}"
                                        href="{{ route('presensi.hadir') }}">Hadir <span
                                            class="{{ str_contains($url, 'hadir') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $hadir_count }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'tidak') ? 'active' : '' }}"
                                        href="{{ route('presensi.tidak') }}">Tidak Hadir <span
                                            class="{{ str_contains($url, 'tidak') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $tidakhadir_count }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table id="table_id" class="display" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Nama Guru </th>
                                                <th> Hari / Tanggal </th>
                                                <th> Jam Masuk </th>
                                                <th> Jam Keluar </th>
                                                <th> Unit </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hadirs as $hadir)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $hadir->nama }}</td>
                                                    <td>{{ $hadir->hari }} / {{ $hadir->tanggal_hari }} -
                                                        {{ $hadir->bulan }} - {{ $hadir->tahun }}</td>
                                                    <td>{{ $hadir->masuk }}</td>
                                                    <td>{{ $hadir->pulang ?? '' }}</td>
                                                    <td>{{ $hadir->keterangan ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Kehadiran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item active text-center">
                            Nama Guru
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">Hari </div>
                                <div class="col-8">: Hari</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">Tanggal </div>
                                <div class="col-8">: tanggal</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">Jam Masuk </div>
                                <div class="col-8">: Jam Masuk</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">Jam Keluar </div>
                                <div class="col-8">: Jam Keluar</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">Status </div>
                                <div class="col-8">: Izin</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">Keterangan </div>
                                <div class="col-8">: Pelatihan</div>
                            </div>
                        </li>
                    </ul>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-secondary btn-block"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                "columnDefs": [{
                        width: 200,
                        targets: 1
                    },
                    {
                        width: 200,
                        targets: 2
                    }
                ],
                "fixedColumns": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
                }
            }, );
        });
    </script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        });
    </script>
@endsection
