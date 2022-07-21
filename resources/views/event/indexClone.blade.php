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
                            <thead class="text-info">
                                <tr>

                                    <th>Event Title</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $row)
                                    <tr>

                                        <td>{{ $row->title }}</td>

                                        <td>{{ date("F j, Y, g:i a", strtotime($row->start)) }}</td>
                                        
                                        <td>
                                            @if ($row->groupActivity)
                                                {{ $row->groupActivity->location }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>
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
                                  <th colspan="3"></th>
                                   <th>
                                     <a href="{{ route('Events.calander') }}" class="btn btn-success">View All</a>
                                     </th>
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

                                    <th>Event Title</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myEvents as $row)
                                    <tr>

                                        <td>{{ $row->title }}</td>
                                        <td>{{ date("F j, Y, g:i a", strtotime($row->start)) }}</td>
                                        <td>
                                            @if($row->groupActivity)
                                            {{ $row->groupActivity->location }}
                                            @endif
                                        </td>
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
