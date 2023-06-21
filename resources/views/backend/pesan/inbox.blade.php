@extends('layouts.admin.app')
@section('title', 'Pesan')
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
                    <div class="breadcrumb-item">Inbox</div>
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
                                                <th> Tanggal</th>
                                                <th> Pengirim </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inboxes as $inbox)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $inbox->Tanggal }}</td>
                                                    <td>{{ $inbox->Pengirim }}</td>
                                                    <td class="text-center">
                                                        {{-- <button class="btn btn btn-warning btn-flat my-1"
                                                            data-toggle="modal"
                                                            data-target="#inbox{{ $inbox->id }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <button class="btn btn btn-danger btn-flat my-1"
                                                            data-toggle="modal"
                                                            data-target="#inbox{{ $inbox->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button> --}}
                                                        <button class="btn btn btn-primary btn-flat my-1"
                                                            data-toggle="modal"
                                                            data-target="#inbox{{ $inbox->id }}">
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

    @foreach ($inboxes as $inbox)
    <div class="modal fade" id="inbox{{ $inbox->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inbox
                    </h5>
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="kelas">Id Inbox</label>
                                        <input type="text" id="keterangan"
                                            class="form-control @error('keterangan') is-invalid @enderror"
                                            name="keterangan" placeholder="Masukkan Nama keterangan"
                                            value="{{ $inbox->id }}" disabled>
                                        @error('keterangan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="kelas">Nomor Telepon</label>
                                        <input type="text" id="keterangan"
                                            class="form-control @error('keterangan') is-invalid @enderror"
                                            name="keterangan" placeholder="Masukkan Nama keterangan"
                                            value="{{ $inbox->Pengirim }}" disabled>
                                        @error('keterangan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="kelas">Pesan</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" id="floatingTextarea" style="height: 415px; resize: none;" disabled>{{ $inbox->Pesan }}</textarea>
                                        </div>
                                        @error('keterangan')
                                            {{ $message }}
                                        @enderror
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
