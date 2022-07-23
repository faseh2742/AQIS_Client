@extends('layouts.master')

@section('title', 'Events / Calander')
@section('heading', 'Events / Calander')
@section('css')
<style>
    .modal-backdrop{
        background-color: transparent !important;
    }
    .modal-backdrop in{
        background-color: transparent !important;
    }
</style>
@endsection
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
            <div class="modal  mt-4" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content mt-4">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Event:</h5>
                        </div>
                        <div class="modal-body">

                            <div class="row p-2" >

                                <div class="form-group col-md-6">
                                    <label for="sel1">Program Name:</label>
                                    <select name="programName" class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Group Activity:</label>
                                    <select name="type" class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="sel1">Group Activity Description:</label>
                                    <select name="description" class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Location:</label>
                                    <select name="location" class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Funder:</label>
                                    <select name="funder"  class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="sel1">Facilitator:</label>
                                    <select name="" class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="sel1">Title:</label>
                                    <input class="form-control"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Services Delivery:</label>
                                    <select class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="sel1">Title:</label>
                                    <input class="form-control"></input>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="sel1">Seat Capacity:</label>
                                    <input class="form-control" type="text" placeholder="0"></input>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="sel1">Date:</label>
                                    <input class="form-control" type="date"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Start Time:</label>
                                    <input class="form-control" type="time"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">End Time:</label>
                                    <input class="form-control" type="time"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Background Color:</label>
                                    <input type="color" id="favcolor" name="favcolor" value="#ff0000" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Border Color:</label>
                                    <input type="color" id="favcolor" name="favcolor" value="#ff0040" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sel1">Front Color:</label>
                                    <input type="color" id="favcolor" name="favcolor" value="#ff0003" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="saveBtn">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeBtn">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // pass _token in all ajax
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // initialize calendar in all events
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "{{ route('calendar.index') }}",
            displayEventTime: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                        event.allDay = true;
                } else {
                        event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                // var event_name = prompt('Event Name:');
                var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
                $('.modal').modal("show");
                $("#saveBtn").click(function(){
                    var event_name = $('#event_name').val();
                    if (event_name) {
                    $.ajax({
                        url: "{{ route('calendar.create') }}",
                        data: {
                            title: event_name,
                            start: start,
                            end: end
                        },
                        type: 'post',
                        success: function (data) {
                           iziToast.success({
                                position: 'topRight',
                                message: 'Event created successfully.',
                            });

                            calendar.fullCalendar('renderEvent', {
                                id: data.id,
                                title: event_name,
                                start: start,
                                end: end,
                                allDay: allDay
                            }, true);
                            calendar.fullCalendar('unselect');
                            window.location.reload();
                        }

                    });

                }
                });
                $("#closeBtn").click(function(){
                $(".modal").modal("hide");
                $('#event_name').val('');
                });


            },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");

                $.ajax({
                    url: "{{ route('calendar.edit') }}",
                    data: {
                        title: event.event_name,
                        start: start,
                        end: end,
                        id: event.id,
                    },
                    type: "POST",
                    success: function (response) {
                        iziToast.success({
                            position: 'topRight',
                            message: 'Event updated successfully.',
                        });
                    }
                });
            },
            eventClick: function (event) {
                var eventDelete = confirm('Are you sure to remove event?');
                if (eventDelete) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('calendar.destroy') }}",
                        data: {
                            id: event.id,
                            _method: 'delete',
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            iziToast.success({
                                position: 'topRight',
                                message: 'Event removed successfully.',
                            });
                        }
                    });
                }
            }
        });
    });
</script>
@endsection
