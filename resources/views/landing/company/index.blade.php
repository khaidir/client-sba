@include('layout.landing.header')
@include('layout.landing.sidebar')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
<div id="kt_app_toolbar" class="app-toolbar py-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
        <div class="d-flex flex-column flex-row-fluid">
            <div class="d-flex align-items-center pt-1">
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                    <li class="breadcrumb-item text-white fw-bold lh-1">
                        <a href="{{url('landing')}}" class="text-white text-hover-primary">
                        <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-white fw-bold lh-1">
                        <a href="{{url('landing')}}" class="text-white text-hover-primary">
                        <span class="text-gray-700 text-hover-primary">Dashboards</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-white fw-bold lh-1">Company</li>
                </ul>
            </div>
            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
                <div class="page-title me-5">
                    <h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">Company 
                        <span class="page-desc text-gray-600 fw-semibold fs-6 pt-3">-</span>
                    </h1>
                </div>
                <div class="d-flex align-self-center flex-center flex-shrink-0">
                    <a href="#" class="btn btn-flex btn-sm btn-outline btn-active-color-primary btn-custom px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Contact</a>
                    <a href="#" class="btn btn-sm btn-active-color-primary btn-outline btn-custom ms-3 px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-container container-xxl">
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title fs-3 fw-bold">Profile Company</div>
            </div>
            <form action="{{route('company.store')}}" method="POST">
                @csrf
                <div class="card-body p-9">
                    <input type="hidden" name="id" class="form-control" id="id" value="{{ @$data->id }}">
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth()->user()->id }}">

                    {{-- <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3 required">Logo</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('assets/landing/media/svg/brand-logos/volicity-9.svg')"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                <i class="ki-outline ki-pencil fs-7"></i>
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                    </div> --}}

                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3 required">Nama Perusahaan / Company Name</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" class="form-control" name="company" placeholder="Input Company" value="{{$data->company ?? ''}}" required/>
                        </div>
                        @if ($errors->has('company'))
                            <span class="text-danger">{{ $errors->first('company') }}</span>
                        @endif
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3 required">Address</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <textarea name="address" class="form-control h-100px" placeholder="Input address">{{$data->address ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3 required">Phone</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" class="form-control" name="phone" placeholder="Input phone" value="{{$data->phone ?? ''}}"/>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3 required">Email</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="email" class="form-control" name="email" placeholder="Input email" value="{{$data->email ?? ''}}"/>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Website</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" class="form-control" name="website" placeholder="Input website" value="{{$data->website ?? ''}}"/>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Penjelasan Umum Pekerjaan / General Description of Task</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <textarea name="description" class="form-control h-100px" placeholder="Input description" required>{{$data->description ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">No. Kontrak/PO</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" class="form-control" name="contract" placeholder="Input no kontrak" value="{{$data->contract ?? ''}}"/>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Periode Kerja</div>
                        </div>
                        <div class="col-xl-4 col-sm-12 mt-2 mb-3">
                            <input type="date" class="form-control" name="periode_start" placeholder="0" value="{{$data->periode_start ?? ''}}" />
                        </div>
                        <div class="col-xl-4 col-sm-12 mt-2 mb-3">
                            <input type="date" class="form-control" name="periode_end" placeholder="0" value="{{$data->periode_end ?? ''}}" />
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Tanggal Permintaan</div>
                        </div>
                        <div class="col-xl-8 fv-row">
                            <div class="position-relative d-flex align-items-center">
                                <i class="ki-outline ki-calendar-8 position-absolute ms-4 mb-1 fs-2"></i>
                                <input type="date" class="form-control ps-12" name="date" placeholder="Pick a date" value="{{$data->date  ?? ''}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> --}}
                    <button type="submit" class="btn btn-primary" style="background:#b78628; color:white">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.landing.footer')

@if (session('success'))
<script>
    Swal.fire(
        'Berhasil!',
        'Data telah berhasil disimpan',
        'success'
    )
</script>
@elseif (session('warning'))
<script>
    Swal.fire(
        'Warning!',
        'Data telah gagal disimpan',
        'warning'
    ).then((result) => {
            if (result.isConfirmed) {
                setTimeout(() => {
                    window.location.href = '/'; 
                }, 1500); // Redirect after 1.5 seconds
            }
    });
</script>
@elseif (session('danger'))
<script>
    Swal.fire(
        'Gagal!',
        'Data telah gagal disimpan',
        'danger'
    )
</script>
@endif

@include('landing.company.script')




