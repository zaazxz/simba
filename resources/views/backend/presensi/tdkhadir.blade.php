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
                                                <th> Unit </th>
                                                <th> Status </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tidakhadirs as $tidakhadir)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $tidakhadir->nama }}</td>
                                                    <td>{{ $tidakhadir->hari }} / {{ $tidakhadir->tgl }}</td>
                                                    <td>{{ $tidakhadir->unit }}</td>
                                                    <td>{{ $tidakhadir->status }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn btn-warning btn-flat my-1" data-toggle="modal" data-target="#updatetdkhadir{{ $tidakhadir->id }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <a class="btn btn btn-danger btn-flat my-1" data-toggle="tooltip"
                                                            title='Delete'
                                                            href="{{ route('presensi.destroy', $tidakhadir->id ?? 'test') }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <button type="button" class="btn btn btn-primary btn-flat my-1" data-toggle="modal" data-target="#info{{ $tidakhadir->id }}">
                                                            <i class="fa fa-info"></i>
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
                </div>
            </div>
        </section>
    </div>

    {{-- Modal Informasi --}}
    @foreach ($tidakhadirs as $tidakhadir)
        <div class="modal fade" id="info{{ $tidakhadir->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                {{ $tidakhadir->nama }}
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-4">Hari / Tanggal </div>
                                    <div class="col-7">: {{ $tidakhadir->hari }} / {{ $tidakhadir->tgl }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-4">Status </div>
                                    <div class="col-7">: {{ $tidakhadir->status }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-4">Keterangan </div>
                                    <div class="col-7">: {{ $tidakhadir->keterangan }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-4">Diperbaharui Oleh </div>
                                    <div class="col-7">: {{ $tidakhadir->update_oleh }}</div>
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
    @endforeach

    {{-- Modal Ubah Data --}}
    @foreach ($tidakhadirs as $tidakhadir)
        <div class="modal fade" id="updatetdkhadir{{ $tidakhadir->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kehadiran {{ $tidakhadir->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical" method="post" action="{{ route('presensi.update', $tidakhadir->id) }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="{{ $tidakhadir->status }}">{{ $tidakhadir->status }}</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Tugas">Tugas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="kelas">keterangan</label>
                                            <input type="text" id="keterangan"
                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                name="keterangan" placeholder="Masukkan keterangan"
                                                value="{{ old('keterangan', $tidakhadir->keterangan) }}">
                                            @error('keterangan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-secondary btn-block"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
