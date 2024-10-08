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
                    <li class="breadcrumb-item text-white fw-bold lh-1">FAQ</li>
                </ul>
            </div>
            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
                <div class="page-title me-5">
                    <h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">FAQ 
                        <span class="page-desc text-gray-600 fw-semibold fs-6 pt-3">Frequesntly Asked Questions</span>
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
            <div class="card-body p-lg-15">
                <div class="mb-13">
                    <div class="mb-15">
                        <h4 class="fs-2x text-gray-800 w-bolder mb-6">Frequesntly Asked Questions</h4>
                        <p class="fw-semibold fs-4 text-gray-600 mb-2">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</p>
                    </div>
                    <div class="row mb-12">
                        <div class="col-md-6 pe-md-10 mb-10 mb-md-0">
                            <h2 class="text-gray-800 fw-bold mb-4">Buying Product</h2>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How does it work?</h4>
                                </div>
                                <div id="kt_job_4_1" class="collapse show fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            </div>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_2">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Do I need a designer to use Admin Theme ?</h4>
                                </div>
                                <div id="kt_job_4_2" class="collapse fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            </div>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_3">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">What do I need to do to start selling?</h4>
                                </div>
                                <div id="kt_job_4_3" class="collapse fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            </div>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_4">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How much does Extended license cost?</h4>
                                </div>
                                <div id="kt_job_4_4" class="collapse fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ps-md-10">
                            <h2 class="text-gray-800 fw-bold mb-4">Installation</h2>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_1">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">What platforms are compatible?</h4>
                                </div>
                                <div id="kt_job_5_1" class="collapse show fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            </div>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_2">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How many people can it support?</h4>
                                </div>
                                <div id="kt_job_5_2" class="collapse fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            </div>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_3">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How long is the warrianty?</h4>
                                </div>
                                <div id="kt_job_5_3" class="collapse fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            </div>
                            <div class="m-0">
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_4">
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
                                        <i class="ki-outline ki-plus-square toggle-off fs-1"></i>
                                    </div>
                                    <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How fast is the installation?</h4>
                                </div>
                                <div id="kt_job_5_4" class="collapse fs-6 ms-1">
                                    <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                </div>
                            </div>
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
                        <img src="assets/media/svg/brand-logos/twitter.svg" class="h-30px my-2" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.landing.footer')
<script>
    // Class definition
    var KTContactApply = function () {
        var submitButton;
        var validator;
        var form;
        var selectedlocation;
        // Private functions
        var initMap = function(elementId) {
            // Check if Leaflet is included
            if (!L) {
                return;
            }
            // Define Map Location
            var leaflet = L.map(elementId, {
                center: [40.725, -73.985],
                zoom: 30
            });
            // Init Leaflet Map. For more info check the plugin's documentation: https://leafletjs.com/
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(leaflet);
            // Set Geocoding
            var geocodeService;
            if (typeof L.esri.Geocoding === 'undefined') {
                geocodeService = L.esri.geocodeService();
            } else {
                geocodeService = L.esri.Geocoding.geocodeService();
            }
            // Define Marker Layer
            var markerLayer = L.layerGroup().addTo(leaflet);
            // Set Custom SVG icon marker
            var leafletIcon = L.divIcon({
                html: `<i class="ki-solid ki-geolocation text-primary fs-3x"></span>`,
                bgPos: [10, 10],
                iconAnchor: [20, 37],
                popupAnchor: [0, -37],
                className: 'leaflet-marker'
            });
            // Show current address
            L.marker([40.724716, -73.984789], { icon: leafletIcon }).addTo(markerLayer).bindPopup('430 E 6th St, New York, 10009.', { closeButton: false }).openPopup();
            // Map onClick Action
            leaflet.on('click', function (e) {
                geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
                    if (error) {
                        return;
                    }
                    markerLayer.clearLayers();
                    selectedlocation = result.address.Match_addr;
                    L.marker(result.latlng, { icon: leafletIcon }).addTo(markerLayer).bindPopup(result.address.Match_addr, { closeButton: false }).openPopup();
    
                    // Show popup confirmation. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        html: 'Your selected - <b>"' + selectedlocation + ' - ' + result.latlng + '"</b>.',
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        // Confirmed
                    });
                });
            });
        }
        return {
            // Public functions
            init: function () {
                // Elements
                form = document.querySelector('#kt_contact_form');
                submitButton = document.getElementById('kt_contact_submit_button');
    
                initForm();
                handleForm();
                initMap('kt_contact_map');
            }
        };
    }();
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTContactApply.init();
    });
</script>
