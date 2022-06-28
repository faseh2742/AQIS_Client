@extends('layouts.master')

@section('title', 'Events / Calander')
@section('heading', 'Events / Calander')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Events Calendar</h4>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card-box">
                                <div id="calendar"></div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/lib/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/calendar/fullcalendar-init.js') }}"></script>
@endsection
@section('script')
    <script>
        var myCalendar = $('#calendar');
        myCalendar.fullCalendar();



        document.addEventListener('DOMContentLoaded', function() {

            $.get("{{ route('Events.getEvents') }}")
                .then(function(response) {
                    console.log(new Date());
                    response.forEach(element => {


                        var myEvent = {
                            title: element.title,
                            allDay: true,
                            start: new Date(),
                            end: new Date(),
                            backgroundColor:element.backgroundColor,
                            borderColor:element.borderColor,
                            textColor:element.textColor,

                        };
                        console.log(new Date());
                        console.log(new Date(element.start));
                        myCalendar.fullCalendar('renderEvent', myEvent);
                    });


                });
        });
    </script>
@endsection
