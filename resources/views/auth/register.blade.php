<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="shortcut icon" type="image/png/svg" href="{{ URL::to('/assets/images/logos/logo.svg') }}" />
    <link rel="stylesheet" href="{{ URL::to('/assets/css/styles.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <a href="{{ route('register') }}" class="text-nowrap logo-img text-center d-block">
                            <img src="{{ URL::to('/assets/images/logos/cohiva-logo.svg') }}" width="170"
                                alt="">
                        </a>
                        <p class="text-center mb-4">Silahkan Registrasi Diri Anda</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Username</label>
                                <input id="username" type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" name="password" class="form-control" required
                                        autocomplete="new-password">
                                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                        <i id="password-toggle-icon" class="bi bi-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" name="password_confirmation"
                                    class="form-control" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fs-5 rounded-2">
                                Register
                            </button>
                            <div class="text-center mt-3">
                                <p class="mb-0">Sudah punya akun? <a class="text-primary fw-bold"
                                        href="{{ route('login') }}">Login</a></p>
                            </div>
                        </form>
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




{{-- Register Bawaan --}}
{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
