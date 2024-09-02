@extends('layout.admin.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0 m-0 font-size-18 page-title">Extended Periode</h2>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item">Extended Periode</li>
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
                            <form action="/extend/store" method="post" class="needs-validation">
                                @csrf
                                <input type="hidden" name="id" class="form-control" id="id" value="{{ @$data->id }}">
                                <div class="row mb-4">
                                    <label for="company_id" class="col-sm-3 col-form-label">Company</label>
                                    <div class="col-sm-5">
                                        <select name="company_id" id="company_id" class="form-control">
                                            <option value=""></option>
                                            @foreach ($company as $c)
                                            <option value="{{ @$c->id }}" {{ (@$data->company_id == $c->id) ? 'selected':'' }}>{{ @$c->company }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company_id'))
                                            <span class="text-danger">{{ $errors->first('company_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="badge" class="col-sm-3 col-form-label">Badge</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="badge" class="form-control @error('badge') is-invalid @enderror" value="{{ old('badge', @$data->badge) }}" id="badge" placeholder="Badge">
                                        @if ($errors->has('badge'))
                                            <span class="text-danger">{{ $errors->first('badge') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">Fullname</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', @$data->name) }}" id="name" placeholder="Fullname">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', @$data->email) }}" id="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="handphone" class="col-sm-3 col-form-label">Handphone</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="handphone" class="form-control @error('handphone') is-invalid @enderror" value="{{ old('handphone', @$data->handphone) }}" id="handphone" placeholder="Handphone">
                                        @if ($errors->has('handphone'))
                                            <span class="text-danger">{{ $errors->first('handphone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="pic" class="col-sm-3 col-form-label">PIC</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror" value="{{ old('pic', @$data->pic) }}" id="pic" placeholder="PIC">
                                        @if ($errors->has('pic'))
                                            <span class="text-danger">{{ $errors->first('pic') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="certificate_period" class="col-sm-3 col-form-label">Certificate Periode</label>
                                    <div class="col-sm-2">
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" name="certificate_period" data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker" data-date-autoclose="true" class="form-control @error('certificate_period') is-invalid @enderror" value="{{ old('certificate_period', @$data->certificate_period) }}" id="certificate_period" placeholder="Certificate Period">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @if ($errors->has('certificate_period'))
                                                <span class="text-danger">{{ $errors->first('certificate_period') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="insurance" class="col-sm-3 col-form-label">Insurance</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="insurance" class="form-control @error('insurance') is-invalid @enderror" value="{{ old('insurance', @$data->insurance) }}" id="insurance" placeholder="Insurance">
                                        @if ($errors->has('insurance'))
                                            <span class="text-danger">{{ $errors->first('insurance') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="remarks" class="col-sm-3 col-form-label">Remarks</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" value="{{ old('remarks', @$data->remarks) }}" id="remarks" placeholder="Remarks">
                                        @if ($errors->has('remarks'))
                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
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
                                            Switch Knots to Approve or Unapprove
                                        </p>
                                        @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                        <a href="/new-worker" class="btn btn-light w-md">Kembali</a>
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
@include('admin.worker.script')
@endsection
