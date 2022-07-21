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
                             
                              <th>Meeting Location</th>
                              <th>Meeting Date</th>
                              <th>Facilitator</th>
                              <th>Status</th>
                              <th>View</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($upcomingmeetings as $row)


                          <tr>


                              <td >{{$row->location}}</td>
                              <td >{{ date("F j, Y, g:i a", strtotime($row->date)) }}</td>
                              <td >{{$row->staff->user->firstName}} {{$row->staff->user->lastName}}</td>
                              <td>
                                <form action="{{route('Meetings.store')}}" name="statusForm{{$row->id}}" method="POST">
                                  @csrf
                                  <input name="id" value="{{$row->id}}" type="hidden">
                            <select class="form-control" name="status" onchange="javascript:$('form[name=statusForm{{$row->id}}]').submit()" style="width:150px">
                            @php
                                $eduDropdown = App\Models\Dropdown::with('items')
                                    ->where('name', 'Meeting Status')
                                    ->first();
                            @endphp
                            @foreach ($eduDropdown->items as $drop)
                                <option value="{{ $drop->item }}" @php echo ($row->status==$drop->item)?"selected":""; @endphp>{{ $drop->item}}</option>
                            @endforeach

                        </select>
                      </form>
                    </td>
                    <td>
                      <a href="javascript:;" onclick="javascript:getMeeting({{$row->id}})" class="btn btn-sm btn-primary">View <i class="ti-eye" aria-hidden="true"></i></a>
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
                              <th>Meeting Location</th>
                              <th>Meeting Date</th>
                              <th>Facilitator</th>
                              <th>Feedback</th>
                              <th>View</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($pastmeetings as $row)


                            <tr>

                                <td >{{$row->location}}</td>
                              <td >{{ date("F j, Y, g:i a", strtotime($row->date)) }}</td>
                              <td >{{$row->staff->user->firstName}} {{$row->staff->user->lastName}}</td>
                              
                               
                                <td>
                                    <a href="{{route('Meetings.show',$row->id)}}" class="btn btn-warning btn-sm">Feedback <i class="fa fa-comments-o" aria-hidden="true"></i></a>
                                </td>
                                 <td>
                      <a href="javascript:;" onclick="javascript:getMeeting({{$row->id}})" class="btn btn-sm btn-primary">View <i class="ti-eye" aria-hidden="true"></i></a>
                    </td
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>
<div class="modal" id="meetingModal">
          
            <div class="modal-body">
            </div>
          
</div>
@endsection
@section('script')
<script >
   function getMeeting(id){
        $.get("{{url('Meetings')}}/"+id)
        .then(function(response){

              $('.modal-body').html(response);
              $('#meetingModal').show();

        })
    }

</script>
@endsection
