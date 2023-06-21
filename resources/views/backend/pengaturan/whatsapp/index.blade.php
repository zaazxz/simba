@extends('layouts.admin.app')
@section('title', 'WhatsApp Gateway')
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
                    <div class="breadcrumb-item">WhatsApp Gateway</div>
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
                {{-- <div class="row">
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
                                                <th> Hari / Tanggal</th>
                                                <th> Jam Masuk </th>
                                                <th> Jam Keluar </th>
                                                <th> Unit </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($confirm as $konfirmasi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $konfirmasi->nama_lengkap }}</td>
                                                    <td>{{ $konfirmasi->hari }} / {{ $konfirmasi->tanggal }} -
                                                        {{ $konfirmasi->bulan }} - {{ $konfirmasi->tahun }}</td>
                                                    <td>{{ $konfirmasi->jam_masuk }}</td>
                                                    <td>{{ $konfirmasi->jam_keluar }}</td>
                                                    <td>{{ $konfirmasi->unit }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn btn-warning btn-flat my-1"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal{{ $konfirmasi->UID }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h1 class="text-center my-5">Coming Soon!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
