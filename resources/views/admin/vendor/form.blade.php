@extends('layout.admin.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box mb-0 d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0 m-0 font-size-18 page-title">Vendor</h2>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item">Vendor</li>
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
                            <form action="/vendor/store" method="post" class="needs-validation">
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
                                    <label for="number_contract" class="col-sm-3 col-form-label">Number PO</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="number_contract" class="form-control @error('number_contract') is-invalid @enderror" value="{{ old('number_contract', @$data->number_contract) }}" id="number_contract" placeholder="Number PO">
                                        @if ($errors->has('number_contract'))
                                            <span class="text-danger">{{ $errors->first('number_contract') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="periode" class="col-sm-3 col-form-label">Periode</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode', @$data->periode) }}" id="periode" placeholder="Periode">
                                        @if ($errors->has('periode'))
                                            <span class="text-danger">{{ $errors->first('periode') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="date_request" class="col-sm-3 col-form-label">Date Request</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="date_request" class="form-control @error('date_request') is-invalid @enderror" value="{{ old('date_request', @$data->date_request) }}" id="date_request" placeholder="Date Request">
                                        @if ($errors->has('date_request'))
                                            <span class="text-danger">{{ $errors->first('date_request') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="type_contract" class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="type_contract" class="form-control @error('type_contract') is-invalid @enderror" value="{{ old('type_contract', @$data->type_contract) }}" id="type_contract" placeholder="Type Contract">
                                        @if ($errors->has('type_contract'))
                                            <span class="text-danger">{{ $errors->first('type_contract') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="work_detail" class="col-sm-3 col-form-label">Work Detail</label>
                                    <div class="col-sm-7">
                                        <textarea name="work_detail" class="form-control @error('work_detail') is-invalid @enderror" id="work_detail" rows="5" cols="30" placeholder="Work Detail">{{ old('work_detail', @$data->work_detail) }}</textarea>
                                        @if ($errors->has('work_detail'))
                                            <span class="text-danger">{{ $errors->first('work_detail') }}</span>
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
                                        <a href="/vendor" class="btn btn-light w-md">Kembali</a>
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
