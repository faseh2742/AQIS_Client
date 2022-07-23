@extends('layouts.master')
@section('title', 'Events')
@section('heading', 'Events')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Upcoming Events </h4>

                </div>
                <div class="card-body">

                        <table class="table table-responsive table-hover" id="table">
                            <thead>
                                <tr>

                                    <th>Title</th>
                                    <th>Service Type</th>
                                    <th>Program</th>
                                    <th>Location</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $row)
                                    <tr>

                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->serviceDelivery }}</td>
                                        <td>
                                            @if ($row->groupActivity)
                                                {{ $row->groupActivity->programName }}
                                            @endif

                                        </td>
                                        <td>
                                            @if ($row->groupActivity)
                                                {{ $row->groupActivity->location }}
                                            @endif
                                        </td>
                                        <td>{{ $row->start }}</td>
                                        <td>{{ $row->end }}</td>
                                        <td>
                                            <form action="{{ route('Events.RegisterClient') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <button class="btn btn-primary btn-sm ">Register</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                <th colspan="6"></th>
                                <th><a href="{{ route('Events.calander') }}" class="btn btn-success float-right">View
                                        All</a></th>
                                    </tr>
                            </tfoot>
                        </table>



                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>My Events </h4>

                </div>
                <div class="card-body">

                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>

                                    <th>Title</th>
                                    <th>Service Type</th>
                                    <th>Program</th>
                                    <th>Location</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myEvents as $row)
                                    <tr>

                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->serviceDelivery }}</td>

                                        <td>{{ ($row->groupActivity->programName)?$row->groupActivity->programNam:"" }}</td>
                                        <td>{{ $row->groupActivity->location }}</td>
                                        <td>{{ $row->start }}</td>
                                        <td>{{ $row->end }}</td>
                                        <td>
                                            <form action="{{ route('Events.UnRegisterClient') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <button class="btn btn-danger btn-sm">Un Register</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                  </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $('table').DataTable({
                "autoWidth": false
            });

        });
    </script>
@endsection
