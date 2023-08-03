<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ config('app.name', 'Namakarya') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/A4.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">


    <!-- Plugins css -->
    <link href="{{ asset('') }}assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">

    <link href="{{ asset('') }}assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet">

    <!-- Dropzone css -->
    <link href="{{ asset('') }}assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">



    <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/vVERSION/js/all.js" data-auto-replace-svg="nest"></script>

    <!--Wysiwig js-->
    <script src="{{ asset('') }}assets/plugins/tinymce/tinymce.min.js"></script>

    <!-- Bootstrap inputmask js -->
    <script src="{{ asset('') }}assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript">
    </script>



</head>


<body>
    @include('sweetalert::alert')
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    @include('layouts.nav')


    <div class="wrapper">
        <div class="container-fluid">
            @yield('content')

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    © {{ date('Y') }} Koperasi Namastra Jaya Sejahtera.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery  -->
    <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/js/popper.min.js"></script>
    <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/js/modernizr.min.js"></script>
    <script src="{{ asset('') }}assets/js/waves.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.scrollTo.min.js"></script>

    <!-- Chart JS -->
    <script src="{{ asset('') }}assets/plugins/chart.js/chart.min.js"></script>
    <script src="{{ asset('') }}assets/pages/chartjs.init.js"></script>


    <!-- Plugins js -->
    <script src="{{ asset('') }}assets/plugins/timepicker/moment.js"></script>
    <script src="{{ asset('') }}assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="{{ asset('') }}assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="{{ asset('') }}assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/colorpicker/jquery-asColor.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/plugins/colorpicker/jquery-asGradient.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/plugins/colorpicker/jquery-asColorPicker.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/plugins/select2/select2.min.js" type="text/javascript"></script>

    <script src="{{ asset('') }}assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"
        type="text/javascript"></script>

    <!-- Plugins Init js -->
    <script src="assets/pages/form-advanced.js"></script>

    <script src="{{ asset('') }}assets/plugins/skycons/skycons.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{ asset('') }}assets/plugins/morris/morris.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('') }}assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>



    <!-- Sweet-Alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App js -->
    <script src="{{ asset('') }}assets/js/app.js"></script>
    <!-- Dropzone js -->
    <script src="{{ asset('') }}assets/plugins/dropzone/dist/dropzone.js"></script>
    <script src="{{ asset('') }}assets/plugins/dropify/js/dropify.min.js"></script>

    @stack('scripts')

</body>

</html>
