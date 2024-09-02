@extends('layout.admin.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0 m-0 font-size-18 page-title">Visitor Access</h2>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item">Visitor Access</li>
                            <li class="breadcrumb-item active">Form</li>
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
                            <h4 class="card-title">{{ (@$data->id == '') ? 'Create':'Edit' }}</h4>
                            <p class="card-title-desc">Please fill out the form below completely. </p>
                            <form action="/access/visitor/store" method="post" class="needs-validation">
                                @csrf
                                <input type="hidden" name="request_id" class="form-control" id="id" value="{{ (@$data->id) ? @$data->request_id : @$request->id}}">
                                <input type="hidden" name="id" class="form-control" id="id" value="{{ @$data->id }}">
                                <div class="row mb-4">
                                    <label for="fullname" class="col-sm-3 col-form-label">Fullname</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname', @$data->fullname) }}" id="fullname" placeholder="Fullname">
                                        @if ($errors->has('fullname'))
                                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
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
                                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-4">
                                        <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                                            <option value="">Pilih</option>
                                            <option value="WNI" {{ @$data->country == 'WNI' ? 'selected':'' }}>WNI</option>
                                            <option value="WNA" {{ @$data->country == 'WNA' ? 'selected':'' }}>WNA</option>
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="type" class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-4">
                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                            <option value="">Pilih</option>
                                            <option value="1" {{ @$data->type == 1 ? 'selected':'' }}>KTP</option>
                                            <option value="2" {{ @$data->type == 2 ? 'selected':'' }}>Passport</option>
                                            <option value="3" {{ @$data->type == 3 ? 'selected':'' }}>Visa</option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="docs_path" class="col-sm-3 col-form-label">Upload</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="docs_path" class="form-control @error('docs_path') is-invalid @enderror" value="{{ old('docs_path', @$data->docs_path) }}" id="docs_path" placeholder="Upload File">
                                        @if ($errors->has('docs_path'))
                                            <span class="text-danger">{{ $errors->first('docs_path') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-switch form-switch-md mb-2" dir="ltr">
                                            <input name="status" class="form-check-input" type="checkbox" value="1" id="SwitchCheckSizemd" {{ (@$data->status == 1)?'checked':'' }}>
                                            <label class="form-check-label" for="SwitchCheckSizemd"></label>
                                        </div>
                                        <p class="text-muted mb-2">
                                            Switch to Active/Non Active Access Request
                                        </p>
                                        @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                        <a href="/access/visitor/{{ (@$data->id) ? @$data->request_id : @$request->id }}" class="btn btn-light w-md">Kembali</a>
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
@include('admin.visitor.script')
@endsection
