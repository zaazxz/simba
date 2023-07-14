@extends('layouts.admin.app')
@section('title', 'Data User')
@section('content')
    @php
        $url = Route::current()->getName();
    @endphp
    <div class="main-content" style="min-height: 555px;">
        <section class="section">
            <div class="section-header">
                <h1> {{ $title }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('pengaturan.user.create') }}" class="btn btn-primary">Tambah Baru</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">User</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'index') ? 'active' : '' }}"
                                        href="{{ route('pengaturan.user.index') }}">Semua <span
                                            class="{{ str_contains($url, 'index') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $user_all }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'aktif') ? 'active' : '' }}"
                                        href="{{ route('pengaturan.user.aktif') }}">Aktif <span
                                            class="{{ str_contains($url, 'aktif') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $user_active }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains($url, 'non') ? 'active' : '' }}"
                                        href="{{ route('pengaturan.user.non') }}">Pending <span
                                            class="{{ str_contains($url, 'non') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $user_deactive }}</span></a>
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
                                                <th>#</th>
                                                <th> Nama Lengkap </th>
                                                <th> Unit </th>
                                                <th> Jabatan </th>
                                                <th> No Telp </th>
                                                <th> Status </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->unit }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ $user->notelp }}</td>
                                                    <td>
                                                        <a href="{{ route('pengaturan.user.status', ['code' => $user->code]) }}">{!! $user->status_text !!}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn btn-warning btn-flat my-1" data-toggle="tooltip"
                                                            title='Edit'
                                                            href="{{ route('pengaturan.user.edit', $user->code ?? 'test') }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a class="btn btn btn-danger btn-flat my-1" data-toggle="tooltip"
                                                            title='Delete'
                                                            href="{{ route('pengaturan.user.destroy', $user->code ?? 'test') }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a class="btn btn btn-primary btn-flat my-1" data-toggle="tooltip"
                                                            title='Detail'
                                                            href="{{ route('pengaturan.user.show', $user->code ?? 'test') }}">
                                                            <i class="fa fa-info"></i>
                                                        </a>
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
