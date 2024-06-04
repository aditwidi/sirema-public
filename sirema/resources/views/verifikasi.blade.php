<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-no-customizer"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Sirema | Verifikasi Email Akun Pengguna</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="{{ asset('img/favicon/favicon.ico') }}"
    />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/core.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('vendor/css/rtl/theme-default.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/node-waves/node-waves.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/typeahead-js/typeahead.css') }}"
    />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/config.js') }}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-basic px-4">
      <div class="authentication-inner py-4">
        <!-- Verify Email -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4 mt-2">
              <div class="app-brand-link gap-2">
                <span class="app-brand demo">
                  <img
                    src="{{ asset('img/branding/logo-sm.png') }}"
                    alt="logo"
                    width="70"
                    height="70"
                  />
                </span>
                <span class="app-brand-text demo text-body fw-bold ms-1"
                  >Sirema</span
                >
              </div>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1 pt-2">Verifikasi Akun Anda ✉️</h4>
            <p class="text-start mb-4">
              Link aktivasi akun telah dikirimkan ke alamat email Anda. Silakan ikuti tautan di dalamnya untuk
              melanjutkan.
            </p>
            <a class="btn btn-primary w-100 mb-3" href="{{ route('login') }}">
              Kembali ke Halaman Login
            </a>
          </div>
        </div>
        <!-- /Verify Email -->
      </div>
    </div>

    <!-- / Content -->

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

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Page JS -->
  </body>
</html>
