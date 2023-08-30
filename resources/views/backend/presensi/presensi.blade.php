@extends('layouts.admin.app')
@section('title', 'Persentase Presensi')
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
                    <div class="breadcrumb-item">Presensi</div>
                </div>
            </div>

            <section class="section-header pb-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains($url, 'keseluruhan') ? 'active' : '' }}"
                            href="{{ route('presensi.keseluruhan') }}">Keseluruhan <span
                                class="{{ str_contains($url, 'keseluruhan') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $count_bulan }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains($url, 'bulanan') ? 'active' : '' }}"
                            href="{{ route('presensi.bulanan') }}">Bulanan <span
                                class="{{ str_contains($url, 'bulanan') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $count_keseluruhan }}</span></a>
                    </li>
                </ul>
            </section>

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
                <div class="row">
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
                                                @if ($url == 'presensi.keseluruhan')
                                                    <th>Jadwal Keseluruhan</th>
                                                @else
                                                    <th>Jadwal Bulanan</th>
                                                @endif
                                                <th> Jadwal Terlaksana </th>
                                                <th> Hadir </th>
                                                <th> Tidak Hadir </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datas as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    @if ($url == 'presensi.keseluruhan')
                                                        <td>{{ $data->jadwal_keseluruhan }}</td>
                                                    @else
                                                        <td>{{ $data->jadwal_bulanan }}</td>
                                                    @endif
                                                    <td>{{ $data->terlaksana }}</td>
                                                    <td>{{ $data->hadir }}</td>
                                                    <td>{{ $data->tidak_hadir }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn btn-warning btn-flat my-1"
                                                            data-toggle="modal" data-target="#edit{{ $data->id }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <a class="btn btn btn-danger btn-flat my-1" data-toggle="tooltip"
                                                            title='Delete'
                                                            href="{{ route('presensi.destroy', $data->id ?? 'test') }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <button type="button" class="btn btn btn-primary btn-flat my-1"
                                                            data-toggle="modal" data-target="#info{{ $data->id }}">
                                                            <i class="fa fa-info"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        @if ($url == 'presensi.keseluruhan')
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7">
                                                        <button class="btn btn-danger btn-block font-weight-bolder"
                                                            data-toggle="modal" data-target="#btnReset">
                                                            Reset seluruh data presensi
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Modal Edit --}}
    @foreach ($datas as $data)
        {{-- Modal --}}
        <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kehadiran {{ $data->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical" method="post" action="{{ route('presensi.store') }}">
                            @csrf
                            @method('post')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Pilih Status</option>
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
                                                name="keterangan" placeholder="Masukkan Nama keterangan"
                                                value="{{ old('keterangan') }}">
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

    {{-- Modal Informasi --}}
    @foreach ($datas as $data)
        {{-- Modal --}}
        <div class="modal fade" id="info{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Grafik Kehadiran Bulanan {{ $data->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical" method="post" action="{{ route('presensi.store') }}">
                            @csrf
                            @method('post')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                {{-- Jadwal Keseluruhan --}}
                                                @if ($url == 'presensi.keseluruhan')
                                                    {{-- Jadwal Keseluruhan Terlaksana --}}
                                                    <div class="mb-4">
                                                        <div class="text-small float-right font-weight-bold text-muted">
                                                            @if ($data->terlaksana == 0)
                                                                0%
                                                            @elseif ($data->jadwal_keseluruhan == 0)
                                                                0%
                                                            @else
                                                                {{ round(($data->terlaksana / $data->jadwal_keseluruhan) * 100) }}%
                                                            @endif
                                                        </div>
                                                        <div class="font-weight-bold mb-1">Jadwal Keseluruhan Terlaksana
                                                        </div>
                                                        <div class="progress" data-height="3" style="height: 3px;">
                                                            <div class="progress-bar" role="progressbar"
                                                                {{-- Data Now --}}
                                                                @if ($data->terlaksana == 0) data-width="0%"
                                                                @elseif ($data->jadwal_keseluruhan == 0)
                                                                    data-width="0%"
                                                                @else
                                                                    data-width="{{ round(($data->terlaksana / $data->jadwal_keseluruhan) * 100) }}%" @endif
                                                                {{-- Value Now --}}
                                                                @if ($data->terlaksana == 0) aria-valuenow="0"
                                                        @elseif ($data->jadwal_keseluruhan == 0)
                                                            aria-valuenow="0"
                                                        @else
                                                            aria-valuenow="{{ round(($data->terlaksana / $data->jadwal_keseluruhan) * 100) }}" @endif
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 80%;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Jadwal Hadir Keseluruhan --}}
                                                    <div class="mb-4">
                                                        <div class="text-small float-right font-weight-bold text-muted">
                                                            @if ($data->hadir == 0)
                                                                0%
                                                            @elseif ($data->jadwal_keseluruhan == 0)
                                                                0%
                                                            @else
                                                                {{ round(($data->hadir / $data->jadwal_keseluruhan) * 100) }}%
                                                            @endif
                                                        </div>
                                                        <div class="font-weight-bold mb-1">Hadir Keseluruhan</div>
                                                        <div class="progress" data-height="3" style="height: 3px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                {{-- Data Now --}}
                                                                @if ($data->jadwal_keseluruhan == 0) data-width="0%"
                                                        @elseif ($data->hadir == 0)
                                                            data-width="0%"
                                                        @else
                                                            data-width="{{ round(($data->hadir / $data->jadwal_keseluruhan) * 100) }}%" @endif
                                                                {{-- Value Now --}}
                                                                @if ($data->jadwal_keseluruhan == 0) aria-valuenow="0"
                                                        @elseif ($data->hadir == 0)
                                                            aria-valuenow="0"
                                                        @else
                                                            aria-valuenow="{{ round(($data->hadir / $data->jadwal_keseluruhan) * 100) }}" @endif
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 80%;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Jadwal Tidak Hadir Keseluruhan --}}
                                                    <div class="mb-4">
                                                        <div class="text-small float-right font-weight-bold text-muted">
                                                            @if ($data->tidak_hadir == 0)
                                                                0%
                                                            @elseif ($data->jadwal_keseluruhan == 0)
                                                                0%
                                                            @else
                                                                {{ round(($data->tidak_hadir / $data->jadwal_keseluruhan) * 100) }}%
                                                            @endif
                                                        </div>
                                                        <div class="font-weight-bold mb-1">Jadwal Tidak Hadir</div>
                                                        <div class="progress" data-height="3" style="height: 3px;">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                {{-- Data Now --}}
                                                                @if ($data->jadwal_keseluruhan == 0) data-width="0%"
                                                        @elseif ($data->tidak_hadir == 0)
                                                            data-width="0%"
                                                        @else
                                                            data-width="{{ round(($data->tidak_hadir / $data->jadwal_keseluruhan) * 100) }}%" @endif
                                                                {{-- Value Now --}}
                                                                @if ($data->jadwal_keseluruhan == 0) aria-valuenow="0"
                                                        @elseif ($data->tidak_hadir == 0)
                                                            aria-valuenow="0"
                                                        @else
                                                            aria-valuenow="{{ round(($data->tidak_hadir / $data->jadwal_keseluruhan) * 100) }}" @endif
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 80%;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Jadwal Bulanan --}}
                                                @else
                                                    {{-- Jadwal Bulanan Terlaksana --}}
                                                    <div class="mb-4">
                                                        <div class="text-small float-right font-weight-bold text-muted">
                                                            @if ($data->terlaksana == 0)
                                                                0%
                                                            @elseif ($data->jadwal_bulanan == 0)
                                                                0%
                                                            @else
                                                                {{ round(($data->terlaksana / $data->jadwal_bulanan) * 100) }}%
                                                            @endif
                                                        </div>
                                                        <div class="font-weight-bold mb-1">Jadwal Bulanan Terlaksana</div>
                                                        <div class="progress" data-height="3" style="height: 3px;">
                                                            <div class="progress-bar" role="progressbar"
                                                                {{-- Data Now --}}
                                                                @if ($data->terlaksana == 0) data-width="0%"
                                                        @elseif ($data->jadwal_bulanan == 0)
                                                            data-width="0%"
                                                        @else
                                                            data-width="{{ round(($data->terlaksana / $data->jadwal_bulanan) * 100) }}%" @endif
                                                                {{-- Value Now --}}
                                                                @if ($data->terlaksana == 0) aria-valuenow="0"
                                                        @elseif ($data->jadwal_bulanan == 0)
                                                            aria-valuenow="0"
                                                        @else
                                                            aria-valuenow="{{ round(($data->terlaksana / $data->jadwal_bulanan) * 100) }}" @endif
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 80%;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Jadwal Hadir Bulanan --}}
                                                    <div class="mb-4">
                                                        <div class="text-small float-right font-weight-bold text-muted">
                                                            @if ($data->hadir == 0)
                                                                0%
                                                            @elseif ($data->jadwal_bulanan == 0)
                                                                0%
                                                            @else
                                                                {{ round(($data->hadir / $data->jadwal_bulanan) * 100) }}%
                                                            @endif
                                                        </div>
                                                        <div class="font-weight-bold mb-1">Hadir Bulanan</div>
                                                        <div class="progress" data-height="3" style="height: 3px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                {{-- Data Now --}}
                                                                @if ($data->jadwal_bulanan == 0) data-width="0%"
                                                        @elseif ($data->hadir == 0)
                                                            data-width="0%"
                                                        @else
                                                            data-width="{{ round(($data->hadir / $data->jadwal_bulanan) * 100) }}%" @endif
                                                                {{-- Value Now --}}
                                                                @if ($data->jadwal_bulanan == 0) aria-valuenow="0"
                                                        @elseif ($data->hadir == 0)
                                                            aria-valuenow="0"
                                                        @else
                                                            aria-valuenow="{{ round(($data->hadir / $data->jadwal_bulanan) * 100) }}" @endif
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 80%;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Jadwal Tidak Hadir Bulanan --}}
                                                    <div class="mb-4">
                                                        <div class="text-small float-right font-weight-bold text-muted">
                                                            @if ($data->tidak_hadir == 0)
                                                                0%
                                                            @elseif ($data->jadwal_bulanan == 0)
                                                                0%
                                                            @else
                                                                {{ round(($data->tidak_hadir / $data->jadwal_bulanan) * 100) }}%
                                                            @endif
                                                        </div>
                                                        <div class="font-weight-bold mb-1">Jadwal Tidak Hadir</div>
                                                        <div class="progress" data-height="3" style="height: 3px;">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                {{-- Data Now --}}
                                                                @if ($data->jadwal_bulanan == 0) data-width="0%"
                                                        @elseif ($data->tidak_hadir == 0)
                                                            data-width="0%"
                                                        @else
                                                            data-width="{{ round(($data->tidak_hadir / $data->jadwal_bulanan) * 100) }}%" @endif
                                                                {{-- Value Now --}}
                                                                @if ($data->jadwal_bulanan == 0) aria-valuenow="0"
                                                        @elseif ($data->tidak_hadir == 0)
                                                            aria-valuenow="0"
                                                        @else
                                                            aria-valuenow="{{ round(($data->tidak_hadir / $data->jadwal_bulanan) * 100) }}" @endif
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 80%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
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

    {{-- Modal Reset Data --}}
    <div class="modal fade" id="btnReset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Data Presensi?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn btn-success btn-block" href="{{ route('presensi.reset') }}">
                                        Ya
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-danger btn-block" data-dismiss="modal">
                                        Tidak
                                    </button>
                                </div>
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
