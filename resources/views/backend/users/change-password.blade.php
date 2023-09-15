@extends('layouts.admin.app')
@section('title','Ganti Password')
@section ('content')
<div class="main-content" style="min-height: 524px;">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Back</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Profile</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $title }}</h2>
            <p class="section-lead">
                Dihalaman ini Anda dapat {{ $title }} untuk mengamankan akun Anda.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ route('change.password') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row mb-4{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password saat ini</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input id="current_password" type="password"class="form-control" name="current_password" required>
                                        @if ($errors->has('current_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current_password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Baru</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input id="new_password" type="password"class="form-control" name="new_password" required>
                                        @if ($errors->has('new_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-4{{ $errors->has('new_password_confirm') ? ' has-error' : '' }}">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password Baru</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input id="new_password_confirmation" type="password"class="form-control" name="new_password_confirmation" required>
                                        @if ($errors->has('new_password_confirm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new_password_confirm') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Ganti Password</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </form>
</div>
</section>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function() {

        $('#new_password_confirmation').on('input', function() {

            let newPassword = $('#new_password').val();

            if (newPassword === $('#new_password_confirmation').val()) {
                $('#new_password_confirmation').removeClass('is-invalid');
                console.log($('#new_password_confirmation').val());
            } else {
                $('#new_password_confirmation').addClass('is-invalid');
            }

        })
    });
</script>

@endsection
