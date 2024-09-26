<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CLIENT</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="" />
		<link rel="canonical" href="" />
		<link rel="shortcut icon" href="{{ asset('assets/landing/media/logos/favicon.ico') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{ asset('assets/landing/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/landing/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	</head>

    <body id="kt_body" class="app-blank">
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<a href="#" class="d-block d-lg-none mx-auto py-20">
					<img alt="Logo" src="{{ asset('assets/landing/media/logos/default.svg') }}" class="theme-light-show h-25px" />
					<img alt="Logo" src="{{ asset('assets/landing/media/logos/default-dark.svg') }}" class="theme-dark-show h-25px" />
				</a>
				<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
					<div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
						<div class="py-20">
@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@elseif (session('warning'))
	<div class="alert alert-danger">
		{{ session('danger') }}
	</div>
@elseif (session('danger'))
	<div class="alert alert-danger">
		{{ session('danger') }}
	</div>
@endif
							<form class="form w-100" action="{{route('biodata.store')}}" method="POST">
								@csrf
                    			<input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth()->user()->id }}">

								<div class="text-start mb-10">
									<h1 class="text-gray-900 mb-3 fs-3x" data-kt-translate="sign-up-title">Profile Data</h1>
									<div class="text-gray-500 fw-semibold fs-6" data-kt-translate="general-desc">Please complete your profile information to proceed</div>
								</div>
								<div class="row fv-row mb-7">
									<div class="col-xl-12">
										<input class="form-control form-control-lg form-control-solid" type="text" name="name_user" value="{{ Auth()->user()->name }}"/>
									</div>
								</div>
								<div class="fv-row mb-10">
									<input class="form-control form-control-lg form-control-solid" type="text" onkeypress="return isNumber(event)" placeholder="NIK" name="nik" required/>
									@if ($errors->has('nik'))
										<span class="text-danger">{{ $errors->first('nik') }}</span>
									@endif
								</div>
								<div class="fv-row mb-10">
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Devision" name="jabatan" autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<input class="form-control form-control-lg form-control-solid" type="text" onkeypress="return isNumber(event)" placeholder="Phone" name="phone" autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Place of birth" name="tmpt_lahir" autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<input class="form-control form-control-lg form-control-solid" type="date" placeholder="Date of birth" name="tgl_lahir" autocomplete="off" />
								</div>
								<div class="fv-row mb-10">
									<textarea class="form-control form-control-lg form-control-solid" name="alamat" placeholder="Address"></textarea>
								</div>
								<div class="d-flex flex-stack">
									<button id="kt_sign_up_submit" class="btn btn-primary" data-kt-translate="sign-up-submit">
										<span class="indicator-label">Save Changes</span>
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{asset('assets/landing/images/bg_bio.png')}})"></div>
			</div>
		</div>
		<script src="{{ asset('assets/landing/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/landing/js/scripts.bundle.js') }}"></script>
	</body>
</html>

<script>
	function isNumber(e) {
		const pattern = /^[0-9]$/;
		return pattern.test(e.key )
	}
</script>