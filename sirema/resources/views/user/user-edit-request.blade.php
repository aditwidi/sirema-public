<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sirema - Edit Request</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />

    <!-- Page CSS -->
    <!-- Include SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/config.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('user') }}" class="app-brand-link">
                        <span class="app-brand-logo">
                            <img src="{{ asset('img/branding/logo-sm.png') }}" alt="logo" width="50" height="50">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold">SIREMA</span>
                    </a>

                    <a href="{{ url("javascript:void(0);") }}" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item">
                        <a href="{{ route('user') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>Dashboards</div>
                            <div class="badge bg-label-primary rounded-pill ms-auto">New</div>
                        </a>
                    </li>

                    <!-- Manajemen Requests -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Manajemen Requests</span>
                    </li>

                    <li class="menu-item active open">
                        <a href="{{ url("javascript:void(0);") }}" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-clipboard-list"></i>
                            <div>Requests</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('user.list-request') }}" class="menu-link">
                                    <div>List Request</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('user.ajukan-request') }}" class="menu-link">
                                    <div>Ajukan Request</div>
                                </a>
                            </li>
                            <li class="menu-item active">
                                <a href="{{ url()->current() }}" class="menu-link">
                                    <div>Edit Request</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Kalender Kegiatan -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Kalender</span>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('user.kalender') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-calendar"></i>
                            <div>Kalender Kegiatan</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="{{ url("javascript:void(0)") }}">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Style Switcher -->
                            <li class="nav-item me-2 me-xl-0">
                                <a class="nav-link style-switcher-toggle hide-arrow" href="{{ url("javascript:void(0);") }}">
                                    <i class="ti ti-md"></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- Quick links  -->
                            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="{{ url("javascript:void(0);") }}" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="ti ti-layout-grid-add ti-md"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end py-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                                        </div>
                                    </div>
                                    <div class="dropdown-shortcuts-list scrollable-container">
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                                    <i class="ti ti-clipboard-list fs-4"></i>
                                                </span>
                                                <a href="{{ route('user.list-request') }}" class="stretched-link">Requests</a>
                                                <small class="text-muted mb-0">List Request</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                                    <i class="ti ti-clipboard-plus fs-4"></i>
                                                </span>
                                                <a href="{{ route('user.ajukan-request') }}" class="stretched-link">Requests</a>
                                                <small class="text-muted mb-0">Ajukan Request</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                                    <i class="ti ti-calendar-event fs-4"></i>
                                                </span>
                                                <a href="{{ route('user.kalender') }}" class="stretched-link">Kalender</a>
                                                <small class="text-muted mb-0">Kalender Kegiatan MK</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                                    <i class="ti ti-logout fs-4"></i>
                                                </span>
                                                <a href="#" class="stretched-link logout-link">
                                                    Account
                                                </a>
                                                <small class="text-muted mb-0">Logout Account</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Quick links -->

                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                <a class="nav-link dropdown-toggle hide-arrow" href="{{ url("javascript:void(0);") }}" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="ti ti-bell ti-md"></i>
                                    <span class="badge bg-danger rounded-pill badge-notifications" id="unreadNotificationsCount">
                                        {{$totalUnreadNotifications}}
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">Notification</h5>
                                            <a href="{{ url("javascript:void(0)") }}" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            @forelse ($notifikasis as $notifikasi)
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            @if($notifikasi->pengajuan->status == 'pending')
                                                                <span class="avatar-initial rounded-circle bg-label-warning"><i
                                                                class="ti ti-clipboard-text"></i></span>
                                                            @elseif ($notifikasi->pengajuan->status == 'disetujui')
                                                                <span class="avatar-initial rounded-circle bg-label-success"><i
                                                                class="ti ti-clipboard-check"></i></span>
                                                            @else
                                                                <span class="avatar-initial rounded-circle bg-label-danger"><i
                                                                class="ti ti-clipboard-x"></i></span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">{{ $notifikasi->message }}</h6>
                                                        <p class="mb-0">{{$notifikasi->message2}}
                                                        </p>
                                                        <small class="text-muted">{{ $notifikasi->created_at->diffForHumans() }}</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read" data-id="{{ $notifikasi->id }}"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive" data-id="{{ $notifikasi->id }}"><span class="ti ti-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @empty
                                                <li class="list-group-item">
                                                    <p class="mb-0">No notifications found.</p>
                                                </li>
                                            @endforelse

                                        </ul>
                                    </li>
                                    <li class="dropdown-menu-footer border-top">
                                        <a href="{{ url("javascript:void(0);") }}" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                                            View all notifications
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Notification -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="{{ url("javascript:void(0);") }}" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        @php
                                        $nameParts = explode(' ', $user->name);
                                        $initials = '';
                                        foreach ($nameParts as $index => $part) {
                                        if ($index < 2) { $initials .=strtoupper($part[0]); } } @endphp <span class="avatar-initial rounded-circle bg-label-primary">{{ $initials }}</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <div class="dropdown-item" style="pointer-events:none;">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @php
                                                        $nameParts = explode(' ', $user->name);
                                                        $initials = '';
                                                        foreach ($nameParts as $index => $part) {
                                                        if ($index < 2) { $initials .=strtoupper($part[0]); } } @endphp <span class="avatar-initial rounded-circle bg-label-primary">{{ $initials }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ $user->name }}</span>
                                                    <small class="text-muted">{{ ucfirst($user->role) }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item logout-link" href="#">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">Logout</span>
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout-form">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>
                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Requests/</span> Edit Request
                        </h4>
                        <!-- Default -->
                        <div class="row">
                            <div class="col-12">
                                <h5>Form Edit Request "{{ $request->judul_request }}"</h5>
                            </div>

                            <!-- Default Wizard -->
                            <div class="col-12 mb-4">
                                <div class="bs-stepper wizard-numbered mt-2">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#account-details">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Detail Pengaju</span>
                                                    <span class="bs-stepper-subtitle">Berisi Informasi Umum
                                                        Pengaju</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i class="ti ti-chevron-right"></i>
                                        </div>
                                        <div class="step" data-target="#personal-info">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Detail Request</span>
                                                    <span class="bs-stepper-subtitle">Berisi Informasi Request</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <form method="POST" action="{{ route('request.update', $request->id) }}" id="editRequestForm">
                                            @csrf
                                            @method('PUT')
                                            <!-- Hidden User ID Field -->
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                            <!-- Detail Pengaju -->
                                            <div id="account-details" class="content">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="namaPengaju">Nama Pengaju</label>
                                                        <input type="text" id="namaPengaju" name="nama_pengaju" class="form-control" value="{{ $request->nama_pengaju }}" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="asalPengaju" class="form-label">Asal Pengaju</label>
                                                        <select id="asalPengaju" name="asal_pengaju" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="mahasiswa" {{ $request->asal_pengaju == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                                            <option value="dosen" {{ $request->asal_pengaju == 'dosen' ? 'selected' : '' }}>Dosen/Tenaga Pendidik</option>
                                                            <option value="bps" {{ $request->asal_pengaju == 'bps' ? 'selected' : '' }}>BPS</option>
                                                            <option value="lainnya" {{ $request->asal_pengaju == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-password-toggle">
                                                        <label class="form-label" for="nomorHandphone">Nomor Handphone</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">+62</span>
                                                            <input type="text" id="nomorHandphone" name="nomor_telepon_pengaju" class="form-control nomorHandphone" value="{{ substr($request->nomor_telepon_pengaju, 3) }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-primary btn-next">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Detail Request -->
                                            <div id="personal-info" class="content">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label" for="judulRequest">Judul Request</label>
                                                        <input type="text" id="judulRequest" name="judul_request" class="form-control" value="{{ $request->judul_request }}" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="bentukRequest" class="form-label">Bentuk
                                                            Request</label>
                                                        <select id="bentukRequest" name="bentuk_request_id" class="selectpicker w-auto" data-style="btn-default">
                                                            @foreach ($bentukRequests as $bentukRequest)
                                                            <option value="{{ $bentukRequest->id }}" {{ $request->bentuk_request_id == $bentukRequest->id ? 'selected' : '' }}>
                                                                {{ $bentukRequest->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="deadline" class="form-label">Deadline</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ti ti-calendar"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="deadline" name="deadline" placeholder="dd-mm-yyyy" value="{{ $request->deadline->format('d-m-Y') }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlahOrang" class="form-label">Jumlah Orang yang Dibutuhkan</label>
                                                        <input class="form-control" type="number" id="jumlahOrang" name="required_personil" value="{{ $request->required_personil }}" />
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <button type="button" class="btn btn-label-primary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        </button>
                                                        <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Default Wizard -->
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                    <div>
                                        ©
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                        , made with ❤️ by <a href="{{ url("#") }}" target="_blank" class="fw-semibold">Media
                                            Kampus</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>

        <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
        <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
        <script src="{{ asset('vendor/libs/typeahead-js/typeahead.js') }}"></script>

        <script src="{{ asset('vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
        <script src="{{ asset('vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
        <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
        <script src="{{ asset('vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
        <script src="{{ asset('vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
        <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/sweet-alert.js') }}"></script>

        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Page JS -->

        <script src="{{ asset('js/form-wizard-numbered.js') }}"></script>
        <script src="{{ asset('js/forms-pickers.js') }}"></script>
        <script>
            var disabledDates = @json($disabledDates);
            var videoId = @json($videoId);
            var liputanId = @json($liputanId);
        </script>
        <script src="{{ asset('js/app-user-edit-deadline.js') }}"></script>

        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/sweet-alert-logout.js') }}"></script>

</body>

</html>
