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
                    <li class="breadcrumb-item text-white fw-bold lh-1">About</li>
                </ul>
            </div>
            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
                <div class="page-title me-5">
                    <h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">About Us 
                        <span class="page-desc text-gray-600 fw-semibold fs-6 pt-3">Tentang kami</span>
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
            <div class="card-body p-lg-17">
                <div class="mb-18">
                    <div class="mb-10">
                        <div class="text-center mb-15">
                            <h3 class="fs-2hx text-gray-900 mb-5">About Us</h3>
                            <div class="fs-5 text-muted fw-semibold">
                                Informasi Mengenai Pabrik Lhoknga 
                            </div>
                        </div>
                        <div class="overlay">
                            <img class="w-100 card-rounded" src="images/1.jpg" alt="" />
                            {{-- 
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <a href="pages/pricing.html" class="btn btn-primary">Pricing</a>
                                <a href="pages/careers/apply.html" class="btn btn-light-primary ms-3">Join Us</a>
                            </div>
                            --}}
                        </div>
                    </div>
                    <div class="fs-5 fw-semibold">
                        <p class="mb-8" style="text-align: justify;">
                            Kolaborasi tim yang terstruktur dan sistematis serta kesigapan dalam mengikuti arahan dari konsultan untuk melakukan perbaikan, merupakan salah satu pendorong utama tercapainya peringkat Hijau untuk kedua kalinya bagi Pabrik Lhoknga di tahun 2022. Pencapaian ini juga berkat kontribusi beberapa program unggulan.
                            Termasuk di antaranya adalah Koperasi Syariah (KopSyah) yang memberikan kemudahan akses permodalan bagi masyarakat melalui koperasi simpan pinjam sistem syari'ah. Pada aspek lingkungan, Pabrik Lhoknga menerapkan inisiatif penghematan penggunaan air bersih melalui instalasi fasilitas daur ulang air untuk proses pendinginan mesin, serta penurunan beban pencemar air melalui instalasi drum filtrasi limbah cair di Instalasi Pengolahan Air Limbah (IPAL) air domestik.
                            Pabrik Lhoknga juga melakukan upaya penurunan pemakaian energi listrik pada Raw Mill Separator Motor Upgrade, pemakaian oli bekas di Kiln Burner sebagai upaya pengurangan emisi karbon, dan optimalisasi penggunaan Cement Grinding Aid (CGA) Refill pada Cement Mill.
                        </p>
                    </div>
                </div>
                <div class="card bg-light mb-18">
                    <div class="card-body py-15">
                        <div class="d-flex flex-center">
                            <div class="d-flex flex-center flex-wrap mb-10 mx-auto gap-5 w-xl-900px">
                                <div class="octagon d-flex flex-center h-200px w-200px bg-body mx-lg-10">
                                    <div class="text-center">
                                        <i class="ki-outline ki-element-11 fs-2tx text-primary"></i>
                                        <div class="mt-1">
                                            <div class="fs-lg-2hx fs-2x fw-bold text-gray-800 d-flex align-items-center">
                                                <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="99">0</div>
                                                %
                                            </div>
                                            <span class="text-gray-600 fw-semibold fs-5 lh-0">User Friendly</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="octagon d-flex flex-center h-200px w-200px bg-body mx-lg-10">
                                    <div class="text-center">
                                        <i class="ki-outline ki-chart-pie-4 fs-2tx text-success"></i>
                                        <div class="mt-1">
                                            <div class="fs-lg-2hx fs-2x fw-bold text-gray-800 d-flex align-items-center">
                                                <div class="min-w-50px" data-kt-countup="true" data-kt-countup-value="99">0</div>
                                                %
                                            </div>
                                            <span class="text-gray-600 fw-semibold fs-5 lh-0">Quick</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="octagon d-flex flex-center h-200px w-200px bg-body mx-lg-10">
                                    <div class="text-center">
                                        <i class="ki-outline ki-shield fs-2tx text-info"></i>
                                        <div class="mt-1">
                                            <div class="fs-lg-2hx fs-2x fw-bold text-gray-800 d-flex align-items-center">
                                                <div class="min-w-50px" data-kt-countup="true" data-kt-countup-value="99">0</div>
                                                %
                                            </div>
                                            <span class="text-gray-600 fw-semibold fs-5 lh-0">Secure</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-2 fw-semibold text-muted text-center mb-3">
                            <span class="fs-1 lh-1 text-gray-700">“</span>
                            Solution For Approval
                            <span class="fs-1 lh-1 text-gray-700">“</span>
                        </div>
                        <div class="fs-2 fw-semibold text-muted text-center">
                            <span class="fs-4 fw-bold text-gray-600">SBA 2024</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 bg-light text-center">
                    <div class="card-body py-12">
                        <a href="#" class="mx-4">
                        <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-30px my-2" alt="" />
                        </a>
                        <a href="#" class="mx-4">
                        <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-30px my-2" alt="" />
                        </a>
                        <a href="#" class="mx-4">
                        <img src="assets/media/svg/brand-logos/telegram.svg" class="h-30px my-2" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.landing.footer')
