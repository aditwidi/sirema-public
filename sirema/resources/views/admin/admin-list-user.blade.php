<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sirema - List User</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset("img/favicon/favicon.ico") }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset("vendor/fonts/fontawesome.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/fonts/tabler-icons.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/fonts/flag-icons.css") }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset("vendor/css/rtl/core.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/css/rtl/theme-default.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/demo.css") }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset("vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/node-waves/node-waves.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/typeahead-js/typeahead.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/bs-stepper/bs-stepper.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/bootstrap-select/bootstrap-select.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/select2/select2.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/formvalidation/dist/css/formValidation.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/flatpickr/flatpickr.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/pickr/pickr-themes.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/datatables-bs5/datatables.bootstrap5.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css") }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset("vendor/js/helpers.js") }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset("js/config.js") }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
               <div class="app-brand demo">
                  <a href="{{ route('admin') }}" class="app-brand-link">
                  <span class="app-brand-logo">
                  <img src="{{ asset("img/branding/logo-sm.png") }}" alt="logo" width="50" height="50">
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
                     <a href="{{ route('admin') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>Dashboards</div>
                        <div class="badge bg-label-primary rounded-pill ms-auto">New</div>
                     </a>
                  </li>
                  <!-- Manajemen Users -->
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">Manajemen Users</span>
                  </li>
                  <li class="menu-item active open">
                     <a href="{{ url("javascript:void(0);") }}" class="menu-link menu-toggle">
                     <i class="menu-icon tf-icons ti ti-users"></i>
                     <div>Users</div>
                     </a>
                     <ul class="menu-sub">
                        <li class="menu-item active">
                           <a href="{{ route('admin.list-user') }}" class="menu-link">
                           <div>List User</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin.tambah-user') }}" class="menu-link">
                           <div>Tambah User</div>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!-- Manajemen Requests -->
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">Manajemen Requests</span>
                  </li>
                  <li class="menu-item">
                     <a href="{{ url("javascript:void(0);") }}" class="menu-link menu-toggle">
                     <i class="menu-icon tf-icons ti ti-clipboard-list"></i>
                     <div>Requests</div>
                     </a>
                     <ul class="menu-sub">
                        <li class="menu-item">
                           <a href="{{ route('admin.list-request') }}" class="menu-link">
                           <div>List Request</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin.ajukan-request') }}" class="menu-link">
                           <div>Ajukan Request</div>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!-- Kalender Kegiatan -->
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">Kalender</span>
                  </li>
                  <li class="menu-item">
                     <a href="{{ route('admin.kalender') }}" class="menu-link">
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
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
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
                          <i class="ti ti-user fs-4"></i>
                        </span>
                        <a href="{{ route('admin.list-user') }}" class="stretched-link">Users</a>
                        <small class="text-muted mb-0">List User</small>
                      </div>
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-clipboard-list fs-4"></i>
                        </span>
                        <a href="{{ route('admin.ajukan-request') }}" class="stretched-link">Requests</a>
                        <small class="text-muted mb-0">Ajukan Request</small>
                      </div>
                    </div>
                    <div class="row row-bordered overflow-visible g-0">
                      <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                          <i class="ti ti-help fs-4"></i>
                        </span>
                        <a href="{{ route('admin.help') }}" class="stretched-link">Bantuan</a>
                        <small class="text-muted mb-0">Informasi Bantuan</small>
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
                <a class="nav-link dropdown-toggle hide-arrow" href="{{ url("javascript:void(0);") }}" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" aria-expanded="false">
                  <i class="ti ti-bell ti-md"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications" id="unreadNotificationsCount"> {{$totalUnreadNotifications}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                  <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Notification</h5>
                      <a href="{{ url("javascript:void(0)") }}" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
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
                    <a href="{{ url("javascript:void(0);") }}"
                      class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                      View all notifications
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
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
                    <a class="nav-link dropdown-toggle hide-arrow" href="{{ url("javascript:void(0);") }}" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            @php
                                $nameParts = explode(' ', $user->name);
                                $initials = '';
                                foreach ($nameParts as $index => $part) {
                                    if ($index < 2) {
                                        $initials .= strtoupper($part[0]);
                                    }
                                }
                            @endphp
                            <span class="avatar-initial rounded-circle bg-label-primary">{{ $initials }}</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ url("pages-account-settings-account.html") }}">
                                <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @php
                                            $nameParts = explode(' ', $user->name);
                                            $initials = '';
                                            foreach ($nameParts as $index => $part) {
                                                if ($index < 2) {
                                                    $initials .= strtoupper($part[0]);
                                                }
                                            }
                                        @endphp
                                        <span class="avatar-initial rounded-circle bg-label-primary">{{ $initials }}</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ $user->name }}</span>
                                    <small class="text-muted">{{ ucfirst($user->role) }}</small>
                                </div>
                                </div>
                            </a>
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
            <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
              aria-label="Search..." />
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> List User</h4>

            <!-- Button to Add User -->
            <div class="button-wrapper mb-4">
                <a href="{{ route('admin.tambah-user') }}" class="btn btn-primary mb-2 text-nowrap">
                <i class="ti ti-plus me-1"></i>
                <span class="align-middle">Tambah User</span>
                </a>
            </div>

            <!-- Role Cards -->
            <div class="row g-4 mb-4">
                @foreach ($roles as $role => $data)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-normal mb-2">Total {{ $data['total'] }} users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    @php $displayed = 0; @endphp
                                    @foreach ($data['users'] as $user)
                                        @if ($displayed < 4) <!-- Display only 4 avatars -->
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $user->name }}" class="avatar avatar-sm pull-up">
                                                @if ($user->avatar)
                                                <img class="rounded-circle" src="{{ asset('path_to_avatar/' . $user->avatar) }}" alt="Avatar" />
                                                @else
                                                @php
                                                    $nameParts = explode(' ', $user->name);
                                                    $initials = '';
                                                    foreach ($nameParts as $index => $part) {
                                                    if ($index < 2) {
                                                        $initials .= strtoupper($part[0]);
                                                    }
                                                    }
                                                @endphp
                                                <span class="avatar-initial rounded-circle bg-label-primary">{{ $initials }}</span>
                                                @endif
                                            </li>
                                            @php $displayed++; @endphp
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                    @if ($data['total'] > 4) <!-- Check if total users are more than 4 -->
                                        <li class="avatar avatar-sm">
                                            <span class="avatar-initial rounded-circle bg-label-secondary">+{{ $data['total'] - 4 }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-1">
                                <div class="role-heading">
                                    <h4 class="mb-1">{{ ucfirst($role) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- End Role Cards -->

            <!-- Role Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">List User SIREMA</h5>
                    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                      <div class="col-md-12 role"></div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table class="datatables-users table border-top">
                    <thead>
                        <tr>
                        <th></th>
                        <th>User</th>
                        <th>Role</th>
                        <th class="cell-fit">Action</th>
                        </tr>
                    </thead>
                    </table>
                </div>
            </div>
            <!--/ Role Table -->
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="{{ url("#") }}" target="_blank" class="fw-semibold">Media Kampus</a>
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset("vendor/libs/jquery/jquery.js") }}"></script>
    <script src="{{ asset("vendor/libs/popper/popper.js") }}"></script>
    <script src="{{ asset("vendor/js/bootstrap.js") }}"></script>
    <script src="{{ asset("vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>
    <script src="{{ asset("vendor/libs/node-waves/node-waves.js") }}"></script>

    <script src="{{ asset("vendor/libs/hammer/hammer.js") }}"></script>
    <script src="{{ asset("vendor/libs/i18n/i18n.js") }}"></script>
    <script src="{{ asset("vendor/libs/typeahead-js/typeahead.js") }}"></script>

    <script src="{{ asset("vendor/js/menu.js") }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset("vendor/libs/moment/moment.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables-bs5/datatables-bootstrap5.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables-responsive/datatables.responsive.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables-buttons/datatables-buttons.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables-buttons/buttons.html5.js") }}"></script>
    <script src="{{ asset("vendor/libs/datatables-buttons/buttons.print.js") }}"></script>
    <script src="{{ asset("vendor/libs/jszip/jszip.js") }}"></script>
    <script src="{{ asset("vendor/libs/select2/select2.js") }}"></script>
    <script src="{{ asset("vendor/libs/formvalidation/dist/js/FormValidation.min.js") }}"></script>
    <script src="{{ asset("vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js") }}"></script>
    <script src="{{ asset("vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js") }}"></script>
    <script src="{{ asset("vendor/libs/cleavejs/cleave.js") }}"></script>
    <script src="{{ asset("vendor/libs/cleavejs/cleave-phone.js") }}"></script>

    <!-- Main JS -->
    <script src="{{ asset("js/main.js") }}"></script>

    <!-- Page JS -->
    <script src="{{ asset("js/app-user-list.js") }}"></script>
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/sweet-alert-logout.js') }}"></script>
  </body>

  </html>