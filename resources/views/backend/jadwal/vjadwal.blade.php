@extends('layouts.admin.app')
@section('title', 'Jadwal KBM ')
@section('content')
    @php
        $url = Route::current()->getName();
    @endphp
    <div class="main-content" style="min-height: 555px;">
        <section class="section">
            <div class="section-header">
                <h1> {{ $title }}</h1>
                <div class="section-header-button">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#import">Import</button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('guru.index') }}">Jadwal</a></div>
                    {{-- <div class="breadcrumb-item">Guru</div> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'index') ? 'active' : '' }}"
                                        href="{{ route('jadwal.index') }}">Semua <span
                                            class="{{ str_contains($url, 'index') ? 'badge badge-white' : 'badge badge-primary' }}"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'today') ? 'active' : '' }}"
                                        href="{{ route('jadwal.today') }}">Hari ini <span
                                            class="{{ str_contains($url, 'today') ? 'badge badge-white' : 'badge badge-primary' }}"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'tommorow') ? 'active' : '' }}"
                                        href="{{ route('jadwal.tommorow') }}">Esok Hari <span
                                            class="{{ str_contains($url, 'esok') ? 'badge badge-white' : 'badge badge-primary' }}"></span></a>
                                </li>
                                @if (Auth::user()->role == 'Guru')
                                    <li class="nav-item">
                                        <a class="nav-link {{ str_contains($url, 'khusus') ? 'active' : '' }}"
                                            href="{{ route('jadwal.khusus') }}">Jadwal Saya<span
                                                class="{{ str_contains($url, 'khusus') ? 'badge badge-white' : 'badge badge-primary' }}"></span></a>
                                    </li>
                                @endif
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
                <!--<p class="section-lead"></p>-->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                    <h4>All People</h4>
                  </div> --}}
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table id="table_id" class="display" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                {{-- <th> UID</th> --}}
                                                {{-- <th> Telp</th> --}}
                                                <th> Nama Lengkap </th>
                                                <th> Hari </th>
                                                <th> Kelas</th>
                                                <th> Mapel </th>
                                                <th> Jml Jam </th>
                                                <th> Jam Masuk </th>
                                                <th> Jam Keluar </th>
                                                <th> Unit </th>
                                                {{-- <th> Status </th> --}}
                                                {{-- <th> </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach ($vjadwals as $jdwl)
                                                @php $i++ @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    {{-- <td>{{ $jdwl->user_uid }}</td> --}}
                                                    {{-- <td>{{ $jdwl->notelp }}</td> --}}
                                                    <td>{{ $jdwl->nama_lengkap }}</td>
                                                    <td>{{ $jdwl->hari }}</td>
                                                    <td>{{ $jdwl->kelas }}</td>
                                                    <td>{{ $jdwl->mapel }}</td>
                                                    <td>{{ $jdwl->jumlah_jam }}</td>
                                                    <td>{{ $jdwl->jam_masuk }}</td>
                                                    <td>{{ $jdwl->jam_keluar }}</td>
                                                    <td>{{ $jdwl->unit }}</td>
                                                    {{-- <td><a href="{{ route('guru.status', ['code' => $guru->code]) }}">{!! $guru->status_text !!}</td> --}}
                                                    {{-- <td align = "center">
                                    <a class="btn btn btn-warning btn-flat" data-toggle="tooltip" title='Edit' href=""><i class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn btn-danger btn-flat" data-toggle="tooltip" title='Delete'  href=""><i class="fa fa-trash"></i></a>
                                    <a class="btn btn btn-primary btn-flat" data-toggle="tooltip" title='Detail'  href=""><i class="fa fa-info"></i></a>
                                </td> --}}
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
@endsection

@section('script')

    <!-- modal -->
    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">IMPORT DATA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('jadwal.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],

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
