<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cohiva Apps</title>
    <link rel="shortcut icon" type="image/png/svg" href="{{ URL::to('/assets/images/logos/logo.svg') }}" />
    <link rel="stylesheet" href="{{ URL::to('/assets/css/styles.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('login') }}" class="text-nowrap logo-img text-center d-block w-100">
                                    <img src="{{ URL::to('/assets/images/logos/cohiva-logo.svg') }}" width="170"
                                        alt="">
                                </a>
                                <p class="text-center">Selamat Datang di Cohiva Apps</p>

                                @if (session('verified'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('verified') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    </div>

                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" autofocus>
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="togglePassword()">
                                                <i id="password-toggle-icon" class="bi bi-eye-slash"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Login
                                    </button>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="mb-0 ms-2">Belum punya akun? </p>
                                        <a class="text-primary fw-bold ms-2"
                                            href="{{ route('register') }}"><u>Register</u></a>
                                    </div>
                                </form>

                                @if (session('not_registered'))
                                    <div class="alert alert-danger mt-3" role="alert">
                                        Username belum terdaftar. Silakan registrasi terlebih dahulu.
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::to('/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::to('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var passwordToggleIcon = document.getElementById("password-toggle-icon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggleIcon.classList.remove("bi-eye-slash");
                passwordToggleIcon.classList.add("bi-eye");
            } else {
                passwordField.type = "password";
                passwordToggleIcon.classList.remove("bi-eye");
                passwordToggleIcon.classList.add("bi-eye-slash");
            }
        }
    </script>
</body>

</html>
