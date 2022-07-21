@extends('layouts.master')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
          <div class="card-title">
              <h4>Upcoming Events </h4>

          </div>
          <div class="card-body">
              <div class="table-responsive">
              	<table class="table">
                      <thead>
                          <tr>
                                <th>Event Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>View</th>
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
                                        <td> <a href="javascript:;" class="btn btn-primary btn-sm" onclick="javascript:getEvent({{$row->id}})">View</a></td>
                                        <td>
                                           
                                            <form action="{{ route('Events.RegisterClient') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <button class="btn btn-success btn-sm ">Register</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                               <tr>
                                  <th colspan="4"></th>
                                   <th>
                                     <a href="{{ route('Events.calander') }}" class="btn btn-info btn-sm float-right">View All</a>
                                    </th>
                                </tr>
                            </tfoot>
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
              <h4>My Events </h4>

          </div>
          <div class="card-body">
              <div class="table-responsive">
              	<table class="table">
                      <thead>
                          <tr>
                                <th>Event Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>View</th>
                                <th>Action</th>
                              
                          </tr>
                          </thead>
                           <tbody>
                                @foreach ($myEvents as $row)
                                    <tr>

                                        <td>{{ $row->title }}</td>

                                        <td>{{ date("F j, Y, g:i a", strtotime($row->start)) }}</td>
                                        
                                        <td>
                                            @if ($row->groupActivity)
                                                {{ $row->groupActivity->location }}
                                            @endif
                                        </td>
                                        <td><a href="javascript:;" class="btn btn-primary btn-sm" onclick="javascript:getEvent({{$row->id}})">View</a></td>
                                        <td>
                                           
                                            <form action="{{ route('Events.UnRegisterClient') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <button class="btn btn-danger btn-sm ">Unregister</button>
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
</div>

<div class="modal" id="eventModal">
          
            <div class="modal-body">
            </div>
          
</div>
@endsection
@section('script')
<script >
   function getEvent(id){
        $.get("{{url('Events')}}/"+id)
        .then(function(response){

              $('.modal-body').html(response);
              $('#eventModal').show();

        })
    }

</script>
@endsection
