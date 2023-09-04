@extends('layouts.admin.app')
@section('title', 'Maintenance')
@section('content')
    @php
        $url = Route::current()->getName();
    @endphp
    <div class="main-content" style="min-height: 555px;">
        <section class="section">
            <div class="section-header">
                <h1> {{ $title }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('pengaturan.maintenance.create') }}" class="btn btn-primary">Tambah Informasi Update</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Maintenance Website</div>
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
                                                <th>No</th>
                                                <th>Versi Website</th>
                                                <th>Tanggal Update</th>
                                                <th>Apa yang baru?</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->version }}</td>
                                                    <td>{{ $data->updated_date }}</td>
                                                    <td>{{ $data->new_feature }}</td>
                                                    <td>
                                                        <a class="btn btn btn-warning btn-flat my-1" data-toggle="tooltip"
                                                            title='Edit'
                                                            href="#">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a class="btn btn btn-danger btn-flat my-1" data-toggle="tooltip"
                                                            title='Delete'
                                                            href="#">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a class="btn btn btn-primary btn-flat my-1" data-toggle="tooltip"
                                                            title='Detail'
                                                            href="#">
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
            });
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
