@extends('layouts.master')

@section('title', 'Meetings')
@section('heading', 'Meetings')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
          <div class="card-title">
              <h4>Upcoming Meetings </h4>

          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Program</th>
                              <th>Service</th>
                              <th>Medium</th>
                              <th>Location</th>
                              <th>Staff</th>
                               <th>Status</th>
                               <th>Meeting</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($upcomingmeetings as $row)


                          <tr>

                              <td>{{$row->programName}}</td>
                              <td>{{$row->serviceProvided}}</td>
                              <td >{{$row->serviceDelivery}}</td>

                              <td >{{$row->location}}</td>
                              <td >{{$row->staff->user->firstName}}</td>
                              <td>

                                @if ($row->status=='Client Cancelled')
                                <span class="badge badge-danger">{{$row->status}}</span>
                                @elseif ($row->status=='No Show')
                                <span class="badge badge-info">{{$row->status}}</span>
                                @elseif ($row->status=='Rejected')
                                <span class="badge badge-dark">{{$row->status}}</span>
                                @elseif ($row->status=='Attended')
                                <span class="badge badge-success">{{$row->status}}</span>
                                @endif
                               </td>
                              <td >
                                @if ($row->meetingLink)
                                <a href="{{$row->meetingLink}}" class="btn btn-success" target="_blank">Join</a>
                                @endif
                            </td>

                          </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
</div>
  <div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Past Meetings </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th>Service</th>
                                <th>Medium</th>
                                <th>Location</th>
                                <th>Staff</th>
                                <th>Status</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($pastmeetings as $row)


                            <tr>

                                <td>{{$row->programName}}</td>
                                <td>{{$row->serviceProvided}}</td>
                                <td >{{$row->serviceDelivery}}</td>

                                <td >{{$row->location}}</td>
                                <td >{{$row->staff->user->firstName}}</td>
                                <td>
                                    @if ($row->status=='Client Cancelled')
                                    <span class="badge badge-danger">{{$row->status}}</span>
                                    @elseif ($row->status=='No Show')
                                    <span class="badge badge-info">{{$row->status}}</span>
                                    @elseif ($row->status=='Rejected')
                                    <span class="badge badge-dark">{{$row->status}}</span>
                                    @elseif ($row->status=='Attended')
                                    <span class="badge badge-success">{{$row->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('Meetings.show',$row->id)}}" class="btn btn-warning btn-sm">Feedback <i class="fa fa-comments-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
