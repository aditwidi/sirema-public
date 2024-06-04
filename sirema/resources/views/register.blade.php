<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sirema | Register</title>

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
    <link rel="stylesheet" href="{{ asset("assets/vendor/fonts/tabler-icons.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendor/fonts/flag-icons.css") }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset("vendor/css/rtl/core.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/css/rtl/theme-default.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/demo.css") }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset("vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/node-waves/node-waves.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/libs/typeahead-js/typeahead.css") }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset("vendor/libs/formvalidation/dist/css/formValidation.min.css") }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset("vendor/css/pages/page-auth.css") }}" />
    <!-- Helpers -->
    <script src="{{ asset("vendor/js/helpers.js") }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset("js/config.js") }}"></script>
</head>

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ asset("img/illustrations/cover-register.png") }}"
                        alt="auth-register-cover" class="img-fluid my-5 auth-illustration" />

                    <img src="{{ asset("img/illustrations/bg-shape-image-light.png") }}" alt="auth-register-cover"
                        class="platform-bg" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Register -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4 d-flex justify-content-center align-items-center">
                        <div class="app-brand-link gap-2">
                            <span class="app-brand demo">
                                <img src="{{ asset("img/branding/logo-sm.png") }}" alt="logo" width="100" height="100">
                            </span>
                        </div>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1 fw-bold">Register Akun Sirema 📝</h3>
                    <p class="mb-4">Membuat Permintaanmu Menjadi Lebih Mudah!</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('registrasi') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{$item}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <ul>
                                <li>{{Session::get('success')}}</li>
                            </ul>
                        </div>
                    @endif
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="name"
                                placeholder="Masukkan Nama Anda" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan Email Anda" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="confirmPassword">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="confirmPassword" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                    </form>

                    <p class="text-center">
                        <span>Sudah Punya Akun?</span>
                        <a href="{{ route('login') }}">
                            <span>Login Ke Sirema</span>
                        </a>
                    </p>

                    <div class="divider my-4">
                        <div class="divider-text">ATAU</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="{{ url('auth/google') }}" class="btn btn-label-google-plus me-3 d-flex align-items-center">
                            <i class="tf-icons fa-brands fa-google fs-5 me-2"></i>
                            Login with Google
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>

    <!-- / Content -->

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
    <script src="{{ asset("vendor/libs/formvalidation/dist/js/FormValidation.min.js") }}"></script>
    <script src="{{ asset("vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js") }}"></script>
    <script src="{{ asset("vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js") }}"></script>

    <!-- Main JS -->
    <script src="{{ asset("js/main.js") }}"></script>

    <!-- Page JS -->
    <script src="{{ asset("js/pages-auth.js") }}"></script>
</body>

</html>
