@extends('layout.admin.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0 m-0 font-size-18 page-title">Users</h2>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-8 col-sm-12">
                            <h4 class="card-title">{{ (@$data->id == '') ? 'Create New User':'Edit Users' }}</h4>
                            <p class="card-title-desc">Please fill out the form below completely.</p>

                            <form action="/pengguna/store" method="post" class="needs-validation">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">Fullname</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="id" class="form-control" id="id" value="{{ @$data->id }}">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', @$data->name) }}" id="name" placeholder="Fullname">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', @$data->email) }}" id="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="handphone" class="col-sm-3 col-form-label">Handphone</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="handphone" class="form-control @error('handphone') is-invalid @enderror" value="{{ old('handphone', @$data->handphone) }}" id="handphone" placeholder="Handphone">
                                        @if ($errors->has('handphone'))
                                            <span class="text-danger">{{ $errors->first('handphone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="handphone" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-lg-4">
                                        <input type="password" name="password" class="form-control" id="password-input" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="handphone" class="col-sm-3 col-form-label">Confirmation Password</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="cpassword" class="form-control" id="cpassword-input" placeholder="Confirmation New Password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="rules" class="col-sm-3 col-form-label">Rules</label>
                                    <div class="col-lg-4">
                                        <select name="roles[]" class="form-control" multiple>
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                                @if(@$data->id)
                                                    <option value="{{ @$role }}" {{ in_array(@$role, @$user_role) ? 'selected':'' }}>{{ @$role }}</option>
                                                @else
                                                    <option value="{{ @$role }}">{{ @$role }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('roles'))
                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="alamat" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" placeholder="Address">{{ old('alamat', @$data->alamat) }}</textarea>
                                        @if ($errors->has('alamat'))
                                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="_status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-2">
                                        <select name="status" id="_statuss" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="1" {{ (@$data->status == '1')?'selected':'' }}>Aktif</option>
                                            <option value="2" {{ (@$data->status == '2')?'selected':'' }}>Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                        <a href="/pengguna" class="btn btn-light w-md">Kembali</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@include('admin.pengguna.script')
@endsection
