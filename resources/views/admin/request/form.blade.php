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
                            <form action="/access/store" method="post" class="needs-validation">
                                @csrf
                                <input type="hidden" name="id" class="form-control" id="id" value="{{ @$data->id }}">
                                <div class="row mb-4">
                                    <label for="destination" class="col-sm-3 col-form-label">Destination</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="destination" class="form-control @error('destination') is-invalid @enderror" value="{{ old('destination', @$data->destination) }}" id="destination" placeholder="Destination">
                                        @if ($errors->has('destination'))
                                            <span class="text-danger">{{ $errors->first('destination') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="duration" class="col-sm-3 col-form-label">Duration</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration', @$data->duration) }}" id="duration" placeholder="Duration">
                                        @if ($errors->has('duration'))
                                            <span class="text-danger">{{ $errors->first('duration') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="pic" class="col-sm-3 col-form-label">PIC</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="pic" class="form-control @error('pic') is-invalid @enderror" value="{{ old('pic', @$data->pic) }}" id="pic" placeholder="PIC">
                                        @if ($errors->has('dates'))
                                            <span class="text-danger">{{ $errors->first('dates') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="remarks" class="col-sm-3 col-form-label">Remarks</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" id="remarks" rows="3" placeholder="Remarks">{{ old('remarks', @$data->remarks) }}</textarea>
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
                                        <a href="/visitor" class="btn btn-light w-md">Kembali</a>
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
