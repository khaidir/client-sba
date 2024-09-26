<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Client - Register</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
    </head>
    <body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <style>body { background-image: url('assets/media/auth/bg10.jpeg'); } [data-bs-theme="dark"] body { background-image: url('assets/media/auth/bg10-dark.jpeg'); }</style>
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <div class="d-flex flex-lg-row-fluid">
                    <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                        <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/images/logo2.png" alt="" />
                        <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">CLIENT SOFTWARE</h1>
                        <div class="text-gray-600 fs-base text-center fw-semibold">Solution For Approval 
                            {{-- <br />and provides some background information about 
                            <br />work following this is a transcript of the interview. --}}
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                    <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                        <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                            <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                                <form class="form w-100" method="POST" action="{{ url('register/process') }}">
                                    @csrf
                                    <div class="text-center mb-11">
                                        <h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
                                    </div>
                                    <div class="fv-row mb-8">
                                        <input type="text" placeholder="Fullname" name="name" class="form-control bg-transparent" required/>
                                    </div>
                                    <div class="fv-row mb-8">
                                        <input type="text" placeholder="Email" name="email" class="form-control bg-transparent" required/>
                                    </div>
                                    <div class="fv-row mb-8" data-kt-password-meter="true">
                                        <div class="mb-1">
                                            <div class="position-relative mb-3">
                                                <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" data-kt-translate="sign-up-input-password" required />
                                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                                    <i class="ki-outline ki-eye-slash fs-2"></i>
                                                    <i class="ki-outline ki-eye fs-2 d-none"></i>
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                            </div>
                                        </div>
                                        <div class="text-muted" data-kt-translate="sign-up-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                                    </div>
                                    <div class="fv-row mb-8">
                                        <input class="form-control bg-transparent" type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="off" data-kt-translate="sign-up-input-confirm-password" required/>
                                    </div>
                                    <div class="d-grid mb-10">
                                        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary" style="background:#b78628; color:white">
                                        <span class="indicator-label">Sign Up</span>
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <div class="text-gray-500 text-center fw-semibold fs-6">Sudah punya akun? 
                                        <a href="{{ url('signin') }}" class="link-primary" style="color:#fcc201 !important">Sign in</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>var hostUrl = "assets/";</script>
        <script src="assets/plugins/global/plugins.bundle.js"></script>
        <script src="assets/js/scripts.bundle.js"></script>
        <script src="assets/js/custom/authentication/sign-in/general.js"></script>
    </body>
</html>
