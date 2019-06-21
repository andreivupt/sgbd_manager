<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('asset/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" />
</head>
<body>
<div class="container-scroller">

    @include('layouts.partials.navbar')

    <div class="container-fluid page-body-wrapper">

    @include('layouts.partials.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">

                @yield('content')

            </div>

            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Andrei SD @ 2019 <a href="https://www.instagram.com/" target="_blank">Portfolio</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>

        </div>
    </div>
</div>


<!-- plugins:js -->
<script src="{{ asset('asset/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('asset/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('asset/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('asset/js/off-canvas.js') }}"></script>
<script src="{{ asset('asset/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('asset/js/template.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('asset/js/dashboard.js') }}"></script>
<script src="{{ asset('asset/js/data-table.js') }}"></script>
<script src="{{ asset('asset/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('asset/js/dataTables.bootstrap4.js') }}"></script>
<!-- End custom js for this page-->
</body>

</html>

