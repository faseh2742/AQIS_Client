@extends('layouts.master')

@section('title', 'Training')
@section('heading', 'Training')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Trainings</h4>
                    <a href='#' class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#trainingModel">Add <i
                            class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Training/ Certification / Professional Affiliation</th>
                                    <th>Association</th>
                                    <th>Year</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myTrainings as $training)
                                    <tr>

                                        <td>{{ $training->subject}}</td>
                                        <td>{{ $training->association }}</td>
                                        <td>{{ $training->training_year }}</td>
                                        <td>{{ $training->country }}</td>
                                        <td>
                                         <div class="row float-right">

                                            <div class="col-sm-6">   <form id="deletetrainingForm{{ $training->id}}" action="{{route('Training.destroy',$training->id)}}" method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                <button class="btn btn-danger btn-sm" type="button" onclick="javascript:(confirm('Do you want to delete ?'))?
                                                document.getElementById('deletetrainingForm{{ $training->id}}').submit():''"><i class="fa fa-trash" ></i></button>
                                                </form>
                                            </div>
                                            <div class="col-sm-6">
                                                    <a href="javascript:;" class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#trainingModelEdit{{ $training->id}}"><i
                                                        class="fa fa-edit"></i>
                                                    </a>
                                            </div>

                                        </div>
                                    </td>

                                    </tr>

                                    <div class="modal fade" id="trainingModelEdit{{ $training->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{route('Training.update',$training->id)}}" method="POST">
                                            @method("PUT")
                                            @csrf
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit {{$training->job_title}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Subject</label>
                                                        <input type="text" name="subject" class="form-control" placeholder="Subject"
                                                            value="{{ $training->subject}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Association</label>
                                                        <input type="hidden" name="id" value="{{$training->id}}">
                                                        <input type="text" class="form-control"
                                                        placeholder="Association" name="association"
                                                        value="{{ $training->association}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control"  name="country">
                                                            @foreach (App\Models\Country::all() as $row)
                                                                <option value="{{ $row->name }}"
                                                                    {{ ($row->name == $training->country) ? "selected":""}}>
                                                                    {{ $row->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Training Year</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Training Year" name="training_year"
                                                            value="{{ $training->training_year}}" required>
                                                    </div>



                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Update</button>

                                                    </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="trainingModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Training.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required
                               >
                        </div>
                        <div class="form-group">
                            <label>Association</label>

                            <input type="text" class="form-control"
                            placeholder="Association" name="association" required
                           >
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control"  name="country">
                                @foreach (App\Models\Country::all() as $row)
                                    <option value="{{ $row->name }}"
                                      >
                                        {{ $row->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Training Year</label>
                            <input type="text" class="form-control"
                                placeholder="Training Year" name="training_year" required
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
@endsection
@section('script')

@endsection
