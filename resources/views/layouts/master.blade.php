<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AQIS Client- @yield('title')</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Toastr -->
    <link href="{{asset('assets/css/lib/toastr/toastr.min.css')}}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{asset('assets/css/lib/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <!-- Range Slider -->
    {{-- <link href="{{asset('assets/css/lib/rangSlider/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/rangSlider/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet"> --}}
    <!-- Bar Rating -->
    {{-- <link href="{{asset('assets/css/lib/barRating/barRating.css')}}" rel="stylesheet"> --}}
    <!-- Nestable -->
    {{-- <link href="{{asset('assets/css/lib/nestable/nestable.css')}}" rel="stylesheet">
    <!-- JsGrid -->
    <link href="{{asset('assets/css/lib/jsgrid/jsgrid-theme.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/jsgrid/jsgrid.min.css')}}" type="text/css" rel="stylesheet" /> --}}
    <!-- Datatable -->
    <link href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/data-table/buttons.bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Calender 2 -->
    {{-- <link href="{{asset('assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet"> --}}
    <!-- Weather Icon -->
    {{-- <link href="{{asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" /> --}}
    <!-- Owl Carousel -->
    {{-- <link href="{{asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" /> --}}
    <!-- Select2 -->
    <link href="{{asset('assets/css/lib/select2/select2.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    {{-- <link href="{{asset('assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet"> --}}
    <!-- Calender -->
    <link href="{{asset('assets/css/lib/calendar/fullcalendar.css')}}" rel="stylesheet" />

    <!-- Common -->
    <link href="{{asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('scripts')
</head>
@php
 $client_id=\App\Models\Client::where('user_id',\Illuminate\Support\Facades\Auth::id())->pluck('id')->first();

@endphp

<body>
    @include('layouts.sidenav')

    <!-- /# sidebar -->


 @include('layouts.topnav')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">

                                <h1 class="text-info"> @yield('heading')
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->

                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')

                        </div>
                    </div>

                </section>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer">
                        <p>{{date('Y')}} © AQIS. -
                            <a href="#">aqis.com</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <!-- Common -->

    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/lib/preloader/pace.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

    <!-- Calender -->
    <script src="{{asset('assets/js/lib/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/moment/moment.js')}}"></script>


    <!--  Flot Chart -->
    {{-- <script src="{{asset('assets/js/lib/flot-chart/excanvas.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.time.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/curvedLines.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/flot-chart-init.js')}}"></script> --}}

    <!--  Chartist -->
    {{-- <script src="{{asset('assets/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/chartist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/chartist/chartist-init.js')}}"></script> --}}

    <!--  Chartjs -->
    {{-- <script src="{{asset('assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/js/lib/chart-js/chartjs-init.js')}}"></script> --}}

    <!--  Knob -->
    {{-- <script src="{{asset('assets/js/lib/knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/knob/knob.init.js')}}"></script> --}}

    <!--  Morris -->
    {{-- <script src="{{asset('assets/js/lib/morris-chart/raphael-min.js')}}"></script>
    <script src="{{asset('assets/js/lib/morris-chart/morris.js')}}"></script>
    <script src="{{asset('assets/js/lib/morris-chart/morris-init.js')}}"></script> --}}

    <!--  Peity -->
    {{-- <script src="{{asset('assets/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/peitychart/peitychart.init.js')}}"></script> --}}

    <!--  Sparkline -->
    {{-- <script src="{{asset('assets/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/sparklinechart/sparkline.init.js')}}"></script> --}}

    <!-- Select2 -->
    {{-- <script src="{{asset('assets/js/lib/select2/select2.full.min.js')}}"></script> --}}

    <!--  Validation -->
    {{-- <script src="{{asset('assets/js/lib/form-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/form-validation/jquery.validate-init.js')}}"></script> --}}

    <!--  Circle Progress -->
    {{-- <script src="{{asset('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script> --}}

    <!--  Vector Map -->
    {{-- <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.algeria.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.argentina.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.brazil.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.france.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.germany.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.greece.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.iran.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.iraq.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.russia.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.tunisia.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.europe.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.usa.js')}}"></script> --}}

    <!--  Simple Weather -->
    {{-- <script src="{{asset('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/weather/weather-init.js')}}"></script> --}}

    <!--  Owl Carousel -->
    {{-- <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script> --}}

    <!--  Calender 2 -->
    {{-- <script src="{{asset('assets/js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/calendar-2/pignose.init.js')}}"></script> --}}


    <!-- Datatable -->
    <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/lib/data-table/buttons.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/lib/data-table/datatables-init.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> --}}


    <!-- JS Grid -->
     {{-- <script src="{{asset('assets/js/lib/jsgrid/db.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/jsgrid.core.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/jsgrid.load-indicator.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/jsgrid.load-strategies.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/jsgrid.sort-strategies.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/jsgrid.field.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/fields/jsgrid.field.text.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/fields/jsgrid.field.number.js')}}"></script>

    <script src="{{asset('assets/js/lib/jsgrid/fields/jsgrid.field.checkbox.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/fields/jsgrid.field.control.js')}}"></script>
    <script src="{{asset('assets/js/lib/jsgrid/jsgrid-init.js')}}"></script> --}}

    <!--  Datamap -->
    {{-- <script src="{{asset('assets/js/lib/datamap/d3.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/datamap/topojson.js')}}"></script>
    <script src="{{asset('assets/js/lib/datamap/datamaps.world.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/datamap/datamap-init.js')}}"></script> --}}

    <!--  Nestable -->
    {{-- <script src="{{asset('assets/js/lib/nestable/jquery.nestable.js')}}"></script>
    <script src="{{asset('assets/js/lib/nestable/nestable.init.js')}}"></script> --}}

    <!--ION Range Slider JS-->
    {{-- <script src="{{asset('assets/js/lib/rangeSlider/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/rangeSlider/moment.js')}}"></script>
    <script src="{{asset('assets/js/lib/rangeSlider/moment-with-locales.js')}}"></script>
    <script src="{{asset('assets/js/lib/rangeSlider/rangeslider.init.js')}}"></script> --}}

    <!-- Bar Rating-->
    {{-- <script src="{{asset('assets/js/lib/barRating/jquery.barrating.js')}}"></script>
    <script src="{{asset('assets/js/lib/barRating/barRating.init.js')}}"></script> --}}

    <!-- jRate -->
    {{-- <script src="{{asset('assets/js/lib/rating1/jRate.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/rating1/jRate.init.js')}}"></script> --}}

    <!-- Sweet Alert -->
    <script src="{{asset('assets/js/lib/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/sweetalert/sweetalert.init.js')}}"></script>

    <!-- Toastr -->
    {{-- <script src="{{asset('assets/js/lib/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/toastr/toastr.init.js')}}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}

    <script>
    @if(Session::has('message'))
    swal("Success!", "{{ session('message') }}", "success");

    @endif
    @if(Session::has('error'))
    swal("Error !", "{{ session('error') }}", "error");
    @endif
    @if(Session::has('info'))
    swal("Error !", "{{ session('info') }}", "info");
    @endif

    </script>



























    <!--  Dashboard 1 -->
    <script src="{{asset('assets/js/dashboard1.js')}}"></script>
    <script src="{{asset('assets/js/dashboard2.js')}}"></script>


    @yield('script')

</body>

</html>
