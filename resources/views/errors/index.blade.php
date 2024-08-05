<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found</title>
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('/assets/images/logos/logo.svg') }}" />
    <link rel="stylesheet" href="{{ URL::to('/assets/css/styles.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                            <div class="card-body text-center">

                                <div class="error-box">
                                    <h1>404</h1>
                                    <h3 class="mb-3 h2"><i class="fas fa-exclamation-triangle"></i> Oops!
                                        {{ __('Errors') }}</h3>
                                    <p class="h4 font-weight-normal"> {{ __('Halaman yang kamu cari Tidak ada !!!') }}</p>
                                    <a href="{{ route('home_new') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ URL::to('/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::to('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ URL::to('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::to('/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ URL::to('/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ URL::to('/assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>
