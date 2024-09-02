<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="administrator">
    <meta name="author" content="khaidirhasan@gmail.com">
    <title>Login</title>
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/css/plugins.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="/libs/toastr/build/toastr.min.css?v=1.0" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="content-wrapper">
        <section class="wrapper bg-soft-primary">
            <div class="container pt-17 pb-12 pt-md-16 pb-md-20 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h3 class="display-5 mb-3">CLIENT</h3>
                        <nav class="d-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item fs-18">Pintu Masuk</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrapper bg-light">
            <div class="container pb-10 pb-md-8">
                <div class="row">
                    <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto mt-n20">
                        <div class="card">
                            <div class="card-body p-11 text-center">
                                <h3 class="mb-2 text-start">Selamat Datang</h3>
                                <p class="lead mb-6 text-start">Masukkan email dan kata sandi anda.</p>
                                <form action="/login/process" method="POST" class="text-start mb-3">
                                    {{ csrf_field() }}
                                    <div class="form-floating mb-4">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" id="loginEmail">
                                        <label for="loginEmail">Email</label>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-floating password-field mb-4">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password" id="loginPassword">
                                        <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                        <label for="loginPassword">Password</label>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success btn-login w-100 mb-2">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="/libs/jquery/jquery.min.js?v=1.0"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/theme.js"></script>

    <script src="/libs/toastr/build/toastr.min.js?v=1.0"></script>
    <script src="/js/pages/toastr.init.js?v=1.0"></script>
    {{-- @endif --}}
    @if (Session::has('error'))
    <script>
        $(document).ready(function() {
            toastr.error('{{ Session::get('error') }}');
        });
    </script>
    @elseif(Session::has('success'))
    <script>
        $(document).ready(function() {
            toastr.success('{{ Session::get('success') }}');
        });
    </script>
    @endif
</body>
</html>
