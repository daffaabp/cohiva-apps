<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cohiva Apps</title>
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('/assets/images/logos/logo.svg') }}" />
    <link rel="stylesheet" href="{{ URL::to('/assets/css/styles.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @stack('custom-css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        @include('layouts.sidebar_menu')
        <!--  Sidebar End -->


        <!--  Main wrapper -->
        <div class="body-wrapper">


            <!--  Header Start -->
            @include('layouts.header')
            <!--  Header End -->



            @yield('content')



            @include('layouts.footer')
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

    <script>
        document.getElementById("delete-btn").addEventListener("click", function(event) {
            event.preventDefault(); // Menghentikan aksi default (submit form)
            if (confirm('Yakin ingin menghapus data?')) {
                document.getElementById("delete-form").submit(); // Mengirimkan formulir jika pengguna menekan OK
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).keydown(function(event) {
                if (event.ctrlKey && event.key === '/') {
                    $('#formkeyword').find('input, button').prop('disabled', false);
                    $('#formkeyword input:first').focus();
                    event.preventDefault();
                }
            });

            $('.js-example-basic-single').select2(); //running select2

        });
    </script>

</body>

</html>
