@extends('layouts.admin.app')
@section('title','Data Petugas')
@section ('content')
@php
$url = Route::current()->getName();
@endphp
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
              <h1> {{ $title }}</h1>
              <div class="section-header-button">
                  <a href="{{ route('petugas.create') }}" class="btn btn-primary">Tambah Baru</a>
              </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('petugas.index') }}">Pengguna</a></div>
              <div class="breadcrumb-item">Petugas</div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card mb-0">
                <div class="card-body">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains($url, 'index') ? 'active' : '' }}" href="{{ route('petugas.index') }}">Total Petugas <span class="{{ str_contains($url, 'index') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $aktif }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains($url, 'pending') ? 'active' : '' }}" href="{{ route('petugas.pending') }}">Pending <span class="{{ str_contains($url, 'pending') ? 'badge badge-white' : 'badge badge-primary' }}">{{ $pending }}</span></a>                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class id="row">
          <div class="section-header-breadcrumb">
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
                            <th> NIP </th>
                            <th> Nama </th>
                            <th> Registrasi </th>
                            <th> status </th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($operators as $operator)
                            @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $operator->nik }}</td>
                                <td>{{ $operator->name }}</td>
                                <td>{{ $operator->created_at->format('d M Y H:i') }}</td>
                                <td><a href="{{ route('petugas.status', ['id' => $operator->id]) }}">{!! $operator->status_text !!}</td>
                                <td align = "center">
                                    <a class="btn btn btn-warning btn-flat" data-toggle="tooltip" title='Edit' href="{{ route('petugas.edit',$operator->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn btn-danger btn-flat" data-toggle="tooltip" title='Delete'  href="{{ route('user.destroy',['id' => $operator->id]) }}"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn btn-primary btn-flat" data-toggle="tooltip" title='Detail'  href="{{ route('user.show',['id' => $operator->id]) }}"><i class="fa fa-info"></i></a>
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
    $('#table_id').DataTable(
        {
        dom: 'Bfrtip',

        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            { width: 200, targets: 1 },
            { width: 200, targets: 2 }
            ],
            "fixedColumns": true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
    });
} );
</script>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    });
</script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal(
        {
             text: "Are you sure you want to delete this post?",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             form.submit();
           }
         });
     });

</script>

@endsection
