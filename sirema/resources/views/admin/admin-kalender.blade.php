<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Sirema - Kalender Kegiatan</title>

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
  <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/typeahead-js/typeahead.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/fullcalendar/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/quill/editor.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

  <!-- Page CSS -->

  <link rel="stylesheet" href="{{ asset('vendor/css/pages/app-calendar.css') }}" />
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
              <li class="menu-item">
                <a href="{{ url("javascript:void(0);") }}" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-users"></i>
                  <div>Users</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
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
              <li class="menu-item active open">
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
                    <a class="nav-link dropdown-toggle hide-arrow" href="{{ url("javascript:void(0);") }}" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                      <i class="ti ti-bell ti-md"></i>
                      <span class="badge bg-danger rounded-pill badge-notifications" id="unreadNotificationsCount"> {{$totalUnreadNotifications}}</span>
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
              <input type="hidden" id="user_id" value="{{ auth()->user()->id }}">

              <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card app-calendar-wrapper">
                  <div class="row g-0">
                    <!-- Calendar Sidebar -->
                    <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                      <div class="border-bottom p-4 my-sm-0 mb-3">
                        <div class="d-grid">
                          <a href="{{ route('admin.ajukan-request') }}" class="btn btn-primary btn-toggle-sidebar">
                            <i class="ti ti-plus me-1"></i>
                            <span class="align-middle">Ajukan Request</span>
                          </a>
                        </div>
                      </div>
                      <div class="p-3">
                        <!-- inline calendar (flatpicker) -->
                        <div class="inline-calendar"></div>

                        <hr class="container-m-nx mb-4 mt-3" />

                        <!-- Filter -->
                        <div class="mb-3 ms-3">
                          <small class="text-small text-muted text-uppercase align-middle">Filter</small>
                        </div>

                        <div class="form-check mb-2 ms-3">
                          <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" checked />
                          <label class="form-check-label" for="selectAll">View All</label>
                        </div>

                        <div class="app-calendar-events-filter ms-3">
                          <div class="form-check form-check-success mb-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-disetujui" data-value="disetujui" checked />
                            <label class="form-check-label" for="select-disetujui">Kegiatan Media Kampus</label>
                          </div>
                        </div>

                        <div class="app-calendar-events-filter ms-3">
                          <div class="form-check form-check-warning mb-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-pending" data-value="pending" checked />
                            <label class="form-check-label" for="select-pending">Semua Pengajuan (Pending)</label>
                          </div>
                        </div>

                        <div class="app-calendar-events-filter ms-3">
                          <div class="form-check form-check-danger mb-2">
                            <input class="form-check-input input-filter" type="checkbox" id="select-ditolak" data-value="ditolak" checked />
                            <label class="form-check-label" for="select-ditolak">Semua Pengajuan (Ditolak)</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Calendar Sidebar -->

                    <!-- Calendar & Modal -->
                    <div class="col app-calendar-content">
                      <div class="card shadow-none border-0">
                        <div class="card-body pb-0">
                          <!-- FullCalendar -->
                          <div id="calendar"></div>
                        </div>
                      </div>
                      <div class="app-overlay"></div>
                      <!-- FullCalendar Offcanvas -->
                      <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                        <div class="offcanvas-header my-1">
                          <h5 class="offcanvas-title" id="addEventSidebarLabel">Add Event</h5>
                          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0">
                          <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                            <div class="mb-3">
                              <label class="form-label" for="eventTitle">Title</label>
                              <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="eventLabel">Label</label>
                              <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel">
                                <option data-label="primary" value="Business" selected>Business
                                </option>
                                <option data-label="success" value="Holiday">Holiday</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="eventStartDate">Start Date</label>
                              <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="eventEndDate">End Date</label>
                              <input type="text" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="End Date" />
                            </div>
                            <div class="mb-3">
                              <label class="switch">
                                <input type="checkbox" class="switch-input allDay-switch" />
                                <span class="switch-toggle-slider">
                                  <span class="switch-on"></span>
                                  <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">All Day</span>
                              </label>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="eventURL">Event URL</label>
                              <input type="url" class="form-control" id="eventURL" name="eventURL" placeholder="https://www.google.com" />
                            </div>
                            <div class="mb-3 select2-primary">
                              <label class="form-label" for="eventGuests">Add Guests</label>
                              <select class="select2 select-event-guests form-select" id="eventGuests" name="eventGuests" multiple>
                                <option data-avatar="1.png" value="Jane Foster">Jane Foster
                                </option>
                                <option data-avatar="3.png" value="Donna Frank">Donna Frank
                                </option>
                                <option data-avatar="5.png" value="Gabrielle Robertson">
                                  Gabrielle Robertson</option>
                                <option data-avatar="7.png" value="Lori Spears">Lori Spears
                                </option>
                                <option data-avatar="9.png" value="Sandy Vega">Sandy Vega
                                </option>
                                <option data-avatar="11.png" value="Cheryl May">Cheryl May
                                </option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="eventLocation">Location</label>
                              <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="Enter Location" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="eventDescription">Description</label>
                              <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                            </div>
                            <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                              <div>
                                <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                                <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                                  Cancel
                                </button>
                              </div>
                              <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- /Calendar & Modal -->
                  </div>
                </div>
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
                      , made with ❤️ by <a href="{{ url("#") }}" target="_blank" class="fw-semibold">Media Kampus</a>
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
      <script src="{{ asset('vendor/libs/fullcalendar/fullcalendar.js') }}"></script>
      <script src="{{ asset('vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
      <script src="{{ asset('vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
      <script src="{{ asset('vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
      <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>
      <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
      <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>

      <!-- Main JS -->
      <script src="{{ asset('js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('js/app-calendar-events.js') }}"></script>
    <script src="{{ asset('js/app-admin-calendar.js') }}"></script>

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/sweet-alert-logout.js') }}"></script>
</body>

</html>
