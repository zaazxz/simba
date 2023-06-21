@extends('layouts.admin.app')

@section('title', 'Detail User')

@section('content')

    @php
        $url = Route::current()->getName();
    @endphp

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Kembali</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pengaturan.user.index') }}">User</a></div>
                    <div class="breadcrumb-item active">Detail User</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image"
                                    src="{{ is_null($user->photo) ? '/assets/admin/img/avatar/avatar-1.png' : asset('images/users/' . $user->photo) }}"
                                    class="rounded-circle profile-widget-picture">
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">{{ $user->name }}</div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-3">Unit 1</div>
                                            <div class="col-9 font-weight-bold">:
                                                @if ($user->unit)
                                                    {{ $user->unit }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-3">Unit 2</div>
                                            <div class="col-9 font-weight-bold">:
                                                @if ($user->unit2)
                                                    {{ $user->unit2 }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-3">NUPTK</div>
                                            <div class="col-9 font-weight-bold">:
                                                @if ($user->nuptk)
                                                    {{ $user->nuptk }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center pt-1">
                                <div class="font-weight-bold mb-2">Hubungi {{ $user->name }}</div>
                                <a href="mailto:{{ $user->email }}?subject=Info Baknus" target="_blank">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?phone={{ $user->phone }}&text=Salam%2C%20...."
                                    target="_blank">
                                    <i class="fa fa-comments"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form method="post" class="needs-validation" novalidate="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No Fingerprint</label>
                                            <input type="text" class="form-control" value="{{ ($user->nirg) ? $user->nirg : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>User ID</label>
                                            <input type="text" class="form-control" value="{{ ($user->uid) ? $user->uid : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" value="{{ ($user->role) ? $user->role : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{ ($user->email) ? $user->email : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" value="{{ ($user->pob) ? $user->pob : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Tanggal Lahir</label>
                                            <input type="text" class="form-control" value="{{ ($user->dob) ? $user->dob : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Jalan (Alamat)</label>
                                            <input type="text" class="form-control" value="{{ ($user->alamat) ? $user->alamat : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Provinsi (Alamat)</label>
                                            <input type="text" class="form-control" value="{{ ($user->provinsi) ? $user->getProvinsi->name : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kabupaten / Kota (Alamat)</label>
                                            <input type="text" class="form-control" value="{{ ($user->kabkota) ?
                                            $user->getKabkota->name : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kecamatan (Alamat)</label>
                                            <input type="text" class="form-control" value="{{ ($user->kecamatan) ? $user->getKecamatan->name : 'Data Kosong'  }}" disabled>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kelurahan (Alamat)</label>
                                            <input type="text" class="form-control" value="{{ ($user->kelurahan) ? $user->getKelurahan->name : 'Data Kosong'  }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')

@endsection
