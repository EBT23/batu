<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Sistem Pemesanan Batu</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/assets/images/logo.png') }}" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/responsive.bootstrap5.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/assets/libs/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/assets/extra-libs/calendar/calendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet" />

    <link
    href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
    rel="stylesheet"
  />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">


        @include('layouts.header')

        @include('layouts.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        {{-- @include('layouts.control-sidebar') --}}

        @include('layouts.footer')



        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{ asset('assets/assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/jquery.ui.touch-punch-improved.js') }}"></script>
        <script src="{{ asset('assets/dist/js/jquery-ui.min.js') }}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{ asset('assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/assets/extra-libs/sparkline/sparkline.js') }}"></script>
        <!--Wave Effects -->
        <script src="{{ asset('assets/dist/js/waves.js') }}"></script>
        <!--Menu sidebar -->
        <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
        <!--Custom JavaScript -->
        <script src="{{ asset('assets/dist/js/custom.min.js') }}"></script>
        <!-- this page js -->
        <script src="{{ asset('assets/assets/libs/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/pages/calendar/cal-init.js') }}"></script>

        <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
        <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
        <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
        <script>
            /****************************************
             *       Basic Table                   *
             ****************************************/
            $("#zero_config").DataTable();
          </script>

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')
    
    myModal.addEventListener('shown.coreui.modal', () => {
      myInput.focus()
    })
    </script>

<script>
    $(document).ready(function() {
    $('#edataTable').DataTable();
} );
</script>
</body>

</html>