<!doctype html>

<html lang="en" class="light-style layout-navbar-fixed layout-wide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}/" data-template="front-pages" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>CV SINAR TERANG FASTENER</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/title.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/nouislider/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-on-scroll/animate-on-scroll.css') }}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/front-config.js') }}"></script>
</head>

<body>
    <script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>

    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
        <div class="container">
            <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8">
                <!-- Menu logo wrapper: Start -->
                <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4 me-xl-8">
                    <!-- Mobile menu toggle: Start-->
                    <button class="navbar-toggler border-0 px-0 me-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-menu-2 ti-lg align-middle text-heading fw-medium"></i>
                    </button>
                    <!-- Mobile menu toggle: End-->
                    <a href="{{ route('login') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/logo/logoqr.png') }}" alt=""
                                class="img-fluid rounded-xl">
                        </span>
                    </a>
                </div>
                <!-- Menu logo wrapper: End -->
                <!-- Menu wrapper: Start -->
                <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                    <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-x ti-lg"></i>
                    </button>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" aria-current="page"
                                href="{{ route('aset.detail') }}#landingHome">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('aset.detail') }}#landingTimeLine">Times
                                Line</a>
                        </li>
                    </ul>
                </div>
                <div class="landing-menu-overlay d-lg-none"></div>
                <!-- Menu wrapper: End -->
                <!-- Toolbar: Start -->
                {{-- <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Style Switcher -->
                    <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-1">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <i class="ti ti-lg"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                    <span class="align-middle"><i class="ti ti-sun me-3"></i>Light</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                    <span class="align-middle"><i class="ti ti-moon-stars me-3"></i>Dark</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                    <span class="align-middle"><i
                                            class="ti ti-device-desktop-analytics me-3"></i>System</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- / Style Switcher-->
                </ul> --}}
                <!-- Toolbar: End -->
            </div>
        </div>
    </nav>
    <!-- Navbar: End -->

    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Useful features: Start -->
        <section id="landingHome" class="section-py landing-features mt-6">
            <div class="container">
                <!-- Upcoming Webinar -->
                <div class="col-xxl-12 col-xxl-6">
                    <div class="card h-150">
                        <div class="card-body">
                            <div class="bg-label-primary rounded text-center mb-4 pt-4">
                                <img class="img-fluid"
                                    src="{{ asset('assets/img/illustrations/girl-with-laptop.png') }}"
                                    alt="Card girl image" width="140" />
                            </div>
                            <h5 class="mb-2">Upcoming Webinar</h5>
                            <p class="small">
                                Next Generation Frontend Architecture Using Layout Engine And React Native Web.
                            </p>
                            <p class="small">
                                Next Generation Frontend Architecture Using Layout Engine And React Native Web.
                            </p>
                            <p class="small">
                                Next Generation Frontend Architecture Using Layout Engine And React Native Web.
                            </p>
                            <div class="row mb-4 g-3">
                                <div class="col-6">
                                    <div class="d-flex">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="ti ti-calendar-event ti-28px"></i></span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">17 Nov 23</h6>
                                            <small>Date</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="ti ti-clock ti-28px"></i></span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">32 minutes</h6>
                                            <small>Duration</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-primary w-100">Join the event</a>
                        </div>
                    </div>
                </div>
                <!--/ Upcoming Webinar -->
            </div>
        </section>
        <!-- Useful features: End -->

        <section id="landingTimeLine" class="section-py landing-features">
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container flex-grow-1 container-p-y">
                    <div class="row overflow-hidden">
                        <div class="col-12">
                            <h4 class="text-center mb-1">
                                Times Line Aset
                            </h4>
                            <ul class="timeline timeline-center mt-12">
                                <li class="timeline-item">
                                    <span class="timeline-indicator timeline-indicator-primary" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-brush"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-right">
                                        <div
                                            class="card-header d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="card-title mb-0">Designing UI</h6>
                                            <div class="meta">
                                                <span class="badge rounded-pill bg-label-primary me-1">Design</span>
                                                <span class="badge rounded-pill bg-label-success">Meeting</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-2">
                                                Our main goal is to design a new mobile application for our client. The
                                                customer
                                                wants a
                                                clean & flat design.
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-2">Participants</p>
                                                    <ul
                                                        class="list-unstyled users-list d-flex align-items-center avatar-group">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" title="Vinnie Mostowy"
                                                            class="avatar avatar-xs pull-up">
                                                            <img class="rounded-circle"
                                                                src="../../assets/img/avatars/5.png" alt="Avatar" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" title="Allen Rieske"
                                                            class="avatar avatar-xs pull-up">
                                                            <img class="rounded-circle"
                                                                src="../../assets/img/avatars/12.png"
                                                                alt="Avatar" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" title="Julee Rossignol"
                                                            class="avatar avatar-xs pull-up">
                                                            <img class="rounded-circle"
                                                                src="../../assets/img/avatars/6.png" alt="Avatar" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" title="Darcey Nooner"
                                                            class="avatar avatar-xs pull-up">
                                                            <img class="rounded-circle"
                                                                src="../../assets/img/avatars/10.png"
                                                                alt="Avatar" />
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-event-time">1st January</div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <span class="timeline-indicator timeline-indicator-success" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-question-mark"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-left">
                                        <h6 class="card-header">Survey Report</h6>
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap mb-6">
                                                <div>
                                                    <div class="avatar avatar-xs me-4">
                                                        <img src="../../assets/img/avatars/4.png" alt="Avatar"
                                                            class="rounded-circle" />
                                                    </div>
                                                </div>
                                                <span>assigned this task to <span class="fw-medium">Sarah</span></span>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="d-flex">
                                                    <div>
                                                        <div class="avatar avatar-xs me-4">
                                                            <img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                                class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 w-100">
                                                        <div class="progress bg-label-danger" style="height: 6px">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 48.7%" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small>Jquery</small>
                                                    </div>
                                                </li>
                                                <li class="d-flex">
                                                    <div>
                                                        <div class="avatar avatar-xs me-4">
                                                            <img src="../../assets/img/avatars/3.png" alt="Avatar"
                                                                class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 w-100">
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 31.3%" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small>React</small>
                                                        <small>React</small>
                                                        <small>React</small>
                                                        <small>React</small>
                                                    </div>
                                                </li>
                                                <li class="d-flex">
                                                    <div>
                                                        <div class="avatar avatar-xs me-4">
                                                            <img src="../../assets/img/avatars/4.png" alt="Avatar"
                                                                class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 w-100">
                                                        <div class="progress bg-label-warning" style="height: 6px">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 30%" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small>Angular</small>
                                                    </div>
                                                </li>
                                                <li class="d-flex">
                                                    <div>
                                                        <div class="avatar avatar-xs me-4">
                                                            <img src="../../assets/img/avatars/5.png" alt="Avatar"
                                                                class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 w-100">
                                                        <div class="progress bg-label-info" style="height: 6px">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 15%" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small>VUE</small>
                                                    </div>
                                                </li>
                                                <li class="d-flex">
                                                    <div>
                                                        <div class="avatar avatar-xs me-4">
                                                            <img src="../../assets/img/avatars/6.png" alt="Avatar"
                                                                class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="w-100">
                                                        <div class="progress bg-label-success" style="height: 6px">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 10%" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small>Laravel</small>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-event-time">2nd January</div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <span class="timeline-indicator timeline-indicator-danger" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-chart-line"></i>
                                    </span>

                                    <div class="timeline-event card p-0" data-aos="fade-right">
                                        <h6 class="card-header">Financial Reports</h6>

                                        <div class="card-body">
                                            <p class="mb-2">Click the button below to read financial reports</p>
                                            <button class="btn btn-outline-primary btn-sm" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                Show Report
                                            </button>
                                            <div class="collapse" id="collapseExample">
                                                <ul class="list-group list-group-flush mt-4">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between flex-wrap">
                                                        <span>Last Years's Profit : <span
                                                                class="fw-medium">$20000</span></span>
                                                        <i class="ti ti-share cursor-pointer"></i>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between flex-wrap">
                                                        <span> This Years's Profit : <span
                                                                class="fw-medium">$25000</span></span>
                                                        <i class="ti ti-share cursor-pointer"></i>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between flex-wrap">
                                                        <span> Last Years's Commission : <span
                                                                class="fw-medium">$5000</span></span>
                                                        <i class="ti ti-share cursor-pointer"></i>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between flex-wrap">
                                                        <span> This Years's Commission : <span
                                                                class="fw-medium">$7000</span></span>
                                                        <i class="ti ti-share cursor-pointer"></i>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between flex-wrap">
                                                        <span> This Years's Total Balance : <span
                                                                class="fw-medium">$70000</span></span>
                                                        <i class="ti ti-share cursor-pointer"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="timeline-event-time">5th January</div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <span class="timeline-indicator timeline-indicator-warning" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-chart-donut-2"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-left">
                                        <h6 class="card-header">Snacks</h6>
                                        <div class="card-body">
                                            <div class="d-flex flex-sm-row flex-column">
                                                <img src="../../assets/img/elements/13.jpg"
                                                    class="rounded me-4 mb-sm-0 mb-2" alt="doughnut" height="64"
                                                    width="64" />
                                                <div>
                                                    <h6 class="mb-2">A Donut which straight gone to Your Tummy</h6>
                                                    <p class="mb-2">
                                                        I gaze longingly at the beautiful, perfect, plump donut. This is
                                                        a
                                                        delicately crafted
                                                        piece of art. The mouthwatering mound of miraculous mush isn't
                                                        able
                                                        to
                                                        escape my
                                                        sight...<a href="javascript:void(0)">read more</a>
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <i class="ti ti-star-filled text-warning"></i>
                                                            <i class="ti ti-star-filled text-warning"></i>
                                                            <i class="ti ti-star-filled text-warning"></i>
                                                            <i class="ti ti-star-filled text-warning"></i>
                                                            <i class="ti ti-star-filled"></i>
                                                        </div>
                                                        <div>
                                                            <span class="fw-medium">$5.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-event-time">10th January</div>
                                    </div>
                                </li>
                                <li class="timeline-item timeline-item-right">
                                    <span class="timeline-indicator timeline-indicator-info" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-left">
                                        <div class="card-header border-0 d-flex justify-content-between">
                                            <h6 class="card-title mb-0">
                                                <i class="ti ti-map-pin"></i>
                                                <span class="align-middle">Location</span>
                                            </h6>
                                            <span class="badge rounded-pill bg-label-danger">High</span>
                                        </div>
                                        <div class="card-body py-0">
                                            <h6 class="mb-2">Final location for the company celebration.</h6>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, quidem?
                                            </p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <div class="d-flex align-items-center flex-wrap cursor-pointer gap-4">
                                                <i class="ti ti-link"></i>
                                                <div class="position-relative">
                                                    <i class="ti ti-brand-hipchat"></i>
                                                    <span
                                                        class="badge rounded-pill bg-info badge-dot badge-notifications"></span>
                                                </div>
                                                <i class="ti ti-user"></i>
                                            </div>
                                            <p class="mb-0">
                                                <span class="text-muted">Due Date:</span>
                                                15th Jan
                                            </p>
                                        </div>
                                        <div class="timeline-event-time">12th January</div>
                                    </div>
                                </li>
                                <li class="timeline-item timeline-item-left">
                                    <span class="timeline-indicator timeline-indicator-primary" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-barbell"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-right">
                                        <div class="card-header border-0 d-flex justify-content-between">
                                            <h6 class="card-title mb-0">Gym Program</h6>
                                            <span class="text-muted">5:00 - 6:10AM</span>
                                        </div>
                                        <div class="card-body pb-4 pt-0">
                                            <div class="hours mb-2">
                                                <i class="ti ti-clock"></i>
                                                <span>1.1 Hours</span>
                                                <i class="ti ti-arrows-right-left mx-2"></i>
                                                <span>Weekly</span>
                                            </div>
                                            <div class="location">
                                                <i class="ti ti-map-pin"></i>
                                                <span class="align-middle">Rock's Gym</span>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <div class="tags">
                                                <span class="badge rounded-pill bg-label-danger me-1">Gym</span>
                                                <span class="badge rounded-pill bg-label-info">Power</span>
                                            </div>
                                            <div>
                                                <i class="ti ti-dots-vertical text-muted cursor-pointer"></i>
                                            </div>
                                        </div>
                                        <div class="timeline-event-time">15th January</div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <span class="timeline-indicator timeline-indicator-success" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-currency-dollar"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-right">
                                        <h6 class="card-header">General Reserve</h6>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li
                                                    class="d-flex justify-content-start align-items-center text-success mb-4">
                                                    <i class="ti ti-currency-dollar ti-lg me-4"></i>
                                                    <div class="ps-4 border-start">
                                                        <small class="text-muted mb-1">Cash</small>
                                                        <h5 class="mb-0">$500</h5>
                                                    </div>
                                                </li>
                                                <li
                                                    class="d-flex justify-content-start align-items-center text-info mb-4">
                                                    <i class="ti ti-credit-card ti-lg me-4"></i>
                                                    <div class="ps-4 border-start">
                                                        <small class="text-muted mb-1">Credit Card</small>
                                                        <h5 class="mb-0">$5000</h5>
                                                    </div>
                                                </li>
                                                <li
                                                    class="d-flex justify-content-start align-items-center text-primary">
                                                    <i class="ti ti-chart-line ti-lg me-4"></i>
                                                    <div class="ps-4 border-start">
                                                        <small class="text-muted mb-1">Investments</small>
                                                        <h5 class="mb-0">$300</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-event-time">16th January</div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <span class="timeline-indicator timeline-indicator-danger" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-server"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-left">
                                        <div class="card-header border-0 d-flex justify-content-between">
                                            <h6 class="card-title mb-0">
                                                <span class="align-middle">Ubuntu Server</span>
                                            </h6>
                                            <span class="badge rounded-pill bg-label-danger">Inactive</span>
                                        </div>
                                        <div class="card-body pb-2 pt-0">
                                            <ul class="list-group list-group-flush">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center ps-0">
                                                    <div>
                                                        <i class="ti ti-world"></i>
                                                        <span>IP Address</span>
                                                    </div>
                                                    <div>192.654.8.566</div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center ps-0">
                                                    <div>
                                                        <i class="ti ti-cpu"></i>
                                                        <span>CPU</span>
                                                    </div>
                                                    <div>4 Cores</div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center ps-0">
                                                    <div>
                                                        <i class="ti ti-server"></i>
                                                        <span>Ram</span>
                                                    </div>
                                                    <div>500 MB</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <div class="server-icons">
                                                <i class="ti ti-share me-2"></i>
                                                <i class="ti ti-refresh"></i>
                                            </div>
                                        </div>
                                        <div class="timeline-event-time">20th January</div>
                                    </div>
                                </li>
                                <li class="timeline-item border-0 pb-4">
                                    <span class="timeline-indicator timeline-indicator-info" data-aos="zoom-in"
                                        data-aos-delay="200">
                                        <i class="ti ti-building-store"></i>
                                    </span>
                                    <div class="timeline-event card p-0" data-aos="fade-right">
                                        <div class="card-header border-0 d-flex justify-content-between">
                                            <h6 class="card-title mb-0"><span class="align-middle">Online Store</span>
                                            </h6>
                                            <i class="ti ti-dots-vertical text-muted cursor-pointer"></i>
                                        </div>
                                        <div class="card-body pt-0">
                                            <p>
                                                Develop an online store of electronic devices for the provided layout,
                                                as
                                                well
                                                as develop a
                                                mobile version of it. The must be compatible with any CMS.
                                            </p>
                                            <div class="d-flex flex-wrap flex-sm-row flex-column">
                                                <div class="mb-sm-0 mb-4 me-12">
                                                    <p class="text-muted mb-2">Developers</p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-xs me-2">
                                                            <span
                                                                class="avatar-initial rounded-circle bg-label-primary">A</span>
                                                        </div>
                                                        <div class="avatar avatar-xs me-2">
                                                            <span
                                                                class="avatar-initial rounded-circle bg-label-success">B</span>
                                                        </div>
                                                        <div class="avatar avatar-xs">
                                                            <span
                                                                class="avatar-initial rounded-circle bg-label-danger">C</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-sm-0 mb-4 me-12">
                                                    <p class="text-muted mb-2">Deadline</p>
                                                    <p class="mb-0">20 Dec 2077</p>
                                                </div>
                                                <div>
                                                    <p class="text-muted mb-2">Budget</p>
                                                    <p class="mb-0">$50000</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-event-time">25th January</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

            </div>
        </section>

    </div>
    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
        <div class="footer-bottom py-3 py-md-5">
            <div
                class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                <div class="mb-2 mb-md-0">
                    <span class="footer-bottom-text">©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </span>
                    <a href="https://pixinvent.com" target="_blank" class="fw-medium text-white">IT,</a>
                    <span class="footer-bottom-text"> CV SINAR TERANG FASTENER</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/animate-on-scroll/animate-on-scroll.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/front-main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-timeline.js') }}"></script>
</body>

</html>
