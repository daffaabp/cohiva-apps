<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Email</title>
    <link rel="shortcut icon" type="image/png/svg" href="{{ URL::to('/assets/images/logos/logo.svg') }}" />
    <link rel="stylesheet" href="{{ URL::to('/assets/css/styles.min.css') }}" />
</head>

<body>
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <a href="{{ route('register') }}" class="text-nowrap logo-img text-center d-block">
                            <img src="{{ URL::to('/assets/images/logos/cohiva-logo.svg') }}" width="170"
                                alt="">
                        </a>
                        <p class="text-center mb-4">Verifikasi Alamat Email Anda</p>

                        <div id="verificationMessage">
                            <p>Silakan verifikasi email Anda dalam 10 menit.</p>
                            <p id="countdown"></p>
                        </div>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Link verifikasi baru telah dikirim ke alamat email Anda') }}
                            </div>
                        @endif

                        {{ __('Sebelum melanjutkan, silakan periksa email Anda untuk mendapatkan link verifikasi.') }}
                        {{ __('Jika Anda tidak menerima email') }},
                        <form id="resendForm" method="POST" action="{{ route('verification.resend') }}"
                            style="display: none;">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Kirim Verifikasi
                                Ulang</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::to('/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::to('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Set the countdown time (in seconds)
        var countdownTime = 600; // 10 minutes

        // Function to update the countdown timer
        function updateCountdown() {
            var minutes = Math.floor(countdownTime / 60);
            var seconds = countdownTime % 60;
            document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s";

            // Decrease the countdown time by 1 second
            countdownTime--;

            // If countdown reaches 0, display the resend button
            if (countdownTime < 0) {
                clearInterval(interval);
                document.getElementById("verificationMessage").innerHTML = "Waktu habis";
                document.getElementById("resendForm").style.display = "block";
            }
        }

        // Call updateCountdown() every second
        var interval = setInterval(updateCountdown, 1000);
    </script>
</body>

</html>









{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
