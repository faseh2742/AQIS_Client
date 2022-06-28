@extends('layouts.master')

@section('title', 'Outcome')
@section('heading', 'Outcome')
@section('content')
@php
 $client_id=\App\Models\Client::where('user_id',\Illuminate\Support\Facades\Auth::id())->pluck('id')->first();

@endphp
<div class="row">
    <div class="col-lg-12">
        @foreach (App\Models\Category::all() as $category)
        <div class="card">
            <div class="card-header bg-secondary" id="heading{{$category->id}}">
                <h5 class="mb-0">
                    <button class="btn btn-light collapsed" data-toggle="collapse" data-target="#collapse{{$category->id}}"
                        aria-expanded="false" aria-controls="collapse{{$category->id}}">
                       {{$category->name}}
                    </button>
                    <a href='#' class="btn btn-primary float-right" data-toggle="modal" data-target="#outcomeModel{{$category->id}}">Add <i
                        class="fa fa-plus"></i></a>
                </h5>
            </div>
            <div id="collapse{{$category->id}}" class="collapse" aria-labelledby="heading{{$category->id}}" data-parent="#accordion">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Outcome</th>
                                        <th>Status</th>
                                        <th>Notes</th>
                                        <th>Date Added</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (App\Models\ClientOutcome::with('outcome')->where(['client_id'=>$client_id,'category_id'=>$category->id])->get() as $outcome)
                                    <tr>

                                        <td>{{$outcome->outcome->outcome}}</td>
                                        <td>{{$outcome->status}}</td>
                                        <td>{{$outcome->notes}}</td>
                                        <td>{{$outcome->created_at}}</td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="outcomeModel{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{$category->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Outcome.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">


                        <div class="form-group">
                            <label>Outcome</label>
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <select class="form-control"  name="outcome_id">
                                @foreach (App\Models\Outcome::where('category_id',$category->id)->get() as $row)
                                    <option value="{{ $row->id }}" >{{ $row->outcome }} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                        <select class="form-control" name="status">
                            @php
                                $eduDropdown = App\Models\Dropdown::with('items')
                                    ->where('name', 'Outcome Status')
                                    ->first();
                            @endphp
                            @foreach ($eduDropdown->items as $row)
                                <option value="{{ $row->item }}">{{ $row->item }}</option>
                            @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" class="form-control"
                                placeholder="Notes" name="notes" required
                              >
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection
