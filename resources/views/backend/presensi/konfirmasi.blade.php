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
                    <div class="breadcrumb-item">Konfirmasi</div>
                </div>
            </div>

            <section class="section-header">
                <h5>Data kehadiran menunggu konfirmasi</h5>
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
                <!--<p class="section-lead"></p>-->
                <div class="row">
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
                </div>
            </div>
        </section>
    </div>

    @foreach ($confirm as $konfirmasi)
        {{-- Modal --}}
        <div class="modal fade" id="exampleModal{{ $konfirmasi->UID }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kehadiran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form form-vertical" method="post" action="{{ route('presensi.store') }}">
                            @csrf
                            @method('post')

                            {{-- Hidden Input --}}
                            <input type="hidden" value="{{ old('uid', $konfirmasi->UID) }}" name="uid">
                            <input type="hidden" value="{{ old('hari', $konfirmasi->hari) }}" name="hari">
                            <input type="hidden" value="{{ old('bulan', $konfirmasi->bulan) }}" name="bulan">
                            <input type="hidden" value="{{ old('tahun', $konfirmasi->tahun) }}" name="tahun">
                            <input type="hidden" value="{{ old('unit', $konfirmasi->unit) }}" name="unit">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Guru</label>
                                            <input type="text" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" placeholder="Masukkan Nama"
                                                value="{{ old('nama', $konfirmasi->nama_lengkap) }}">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
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
