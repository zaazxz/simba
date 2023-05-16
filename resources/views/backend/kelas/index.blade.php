@extends('layouts.admin.app')
@section('title', 'Data Guru')
@section('content')
    @php
        $url = Route::current()->getName();
    @endphp
    <div class="main-content" style="min-height: 555px;">
        <section class="section">
            <div class="section-header">
                <h1> {{ $title }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Baru</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kelas</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'index') ? 'active' : '' }}"
                                        href="{{ route('kelas.index') }}">Semua <span
                                            class="{{ str_contains($url, 'index') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $classrooms_all }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'aktif') ? 'active' : '' }}"
                                        href="{{ route('kelas.aktif') }}">Aktif <span
                                            class="{{ str_contains($url, 'aktif') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $classrooms_active }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'pending') ? 'active' : '' }}"
                                        href="{{ route('kelas.pending') }}">Pending <span
                                            class="{{ str_contains($url, 'non') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $classrooms_deactive }}</span></a>
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
                <!--<p class="section-lead"></p>-->
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
                                                <th> Nama Kelas </th>
                                                <th> Unit </th>
                                                <th> Wali kelas </th>
                                                <th> Status </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        @foreach ($classrooms as $kelas)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kelas->nama }}</td>
                                                    <td>{{ $kelas->unit }}</td>
                                                    <td>{{ $kelas->walikelas->name ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ route('kelas.status', ['code' => $kelas->code]) }}">{!! $kelas->status_text !!}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn btn-warning btn-flat my-1" data-toggle="tooltip"
                                                            title='Edit'
                                                            href="{{ route('kelas.edit', $kelas->code ?? 'test') }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a class="btn btn btn-danger btn-flat my-1" data-toggle="tooltip"
                                                            title='Delete'
                                                            href="{{ route('kelas.destroy', $kelas->code ?? 'test') }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-primary btn-flat my-1"
                                                            data-toggle="modal"
                                                            data-target="#exampleModal{{ $kelas->code }}">
                                                            <i class="fa fa-info"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Kelas --}}
    @foreach ($classrooms as $kelas)
        <div class="modal fade" id="exampleModal{{ $kelas->code }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Kelas
                            {{ $kelas->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <li class="list-group-item active">
                                <div class="row">
                                    <div class="col-5">Nama Kelas</div>
                                    <div class="col-7 font-weight-bold">:
                                        {{ $kelas->nama }}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-5">Jurusan</div>
                                    <div class="col-7 font-weight-bold">:
                                        {{ $kelas->jurusan ?? '-' }}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-5">Wali Kelas</div>
                                    <div class="col-7 font-weight-bold">:
                                        {{ $kelas->walikelas->name ?? '-' }}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-5">No Telp Wali Kelas</div>
                                    <div class="col-7 font-weight-bold">:
                                        {{ $kelas->walikelas->notelp ?? '-' }}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-5">Ketua Murid</div>
                                    <div class="col-7 font-weight-bold">:
                                        {{ $kelas->km }}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-5">No Telp Ketua Murid</div>
                                    <div class="col-7 font-weight-bold">:
                                        {{ $kelas->telp_km }}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-5">Unit</div>
                                    <div class="col-7 font-weight-bold">:
                                        {{ $kelas->unit }}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
