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
  
    
    <!-- Sweet Alert -->
    <link href="{{asset('assets/css/lib/sweetalert/sweetalert.css')}}" rel="stylesheet">
  

    <!-- Calender -->
    <link href="{{asset('assets/css/lib/calendar/fullcalendar.css')}}" rel="stylesheet" />

    <!-- Common -->
    <link href="{{asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

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





    <!-- Datatable -->
    <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>

    <script src="{{asset('assets/js/lib/data-table/datatables-init.js')}}"></script>
  

    <!-- JS Grid -->


    <!--  Datamap -->


    <!-- Sweet Alert -->
    <script src="{{asset('assets/js/lib/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/sweetalert/sweetalert.init.js')}}"></script>


    <script>
    @if(Session::has('message'))
    swal("Success!", "{{ session('message') }}", "success");

    @endif
    @if(Session::has('error'))
    swal("Error !", "{{ session('error') }}", "error");
    @endif
    @if(Session::has('info'))
    swal("Info !", "{{ session('info') }}", "info");
    @endif

    </script>



























    <!--  Dashboard 1 -->
<!--     <script src="{{asset('assets/js/dashboard1.js')}}"></script> -->
<!--     <script src="{{asset('assets/js/dashboard2.js')}}"></script> -->
    

   @yield('scripts')
    @yield('script')


</body>

</html>
