@extends('layouts.master')

@section('title', 'Feedback')
@php
$title="Feedback / ".$meeting->programName;
@endphp
@section('heading', $title)
@section('content')
{{-- <div class="row">
    <div class="col-lg-12">
        @foreach ($questions as $question)
        <div class="card">
            <div class="card-title">
                <h4>{{$question->title}}</h4>
                <a href='#' class="btn btn-primary float-right" data-toggle="modal" data-target="#questionModel">Add
                    <i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <form id="deleteQuestionForm{{ $question->id}}"
                    action="{{ route('Meetings.destroy', $question->id) }}"
                    method="POST" enctype="multipart/form-data">

                    @csrf
                    <textarea class="form-control">

                    </textarea>
                    <button>Submit Answer</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>

</div> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Questions</h4>
                    <a href='#' class="btn btn-primary float-right" data-toggle="modal" data-target="#questionModel">Add
                        <i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>

                                        <td>{{ $question->title }} </td>
                                        <td>{{ $question->created_at }}</td>
                                        <td>{{ $question->updated_at }}</td>


                                        <td>
                                            <div class="row float-right">

                                                <div class="col-sm-3">
                                                    <form id="deleteQuestionForm{{ $question->id}}"
                                                        action="{{ route('Meetings.destroy', $question->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" type="button"
                                                            onclick="javascript:(confirm('Do you want to delete ?'))?
                                                question.getElementById('deleteQuestionForm{{ $question->id}}').submit():'' "><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="javascript:;" class="btn btn-info btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#questionModelEdit{{ $question->id }}"><i
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                </div>

                                                <div class="rating1">
                                                    <div id="blue-stars"></div>
                                                </div>
                                             </div>




                                        </td>

                                    </tr>

                                    <div class="modal fade" id="questionModelEdit{{ $question->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{ route('Meetings.update', $question->id) }}" method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-dialog modal-dialog-centered" role="question">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit
                                                            {{ $question->title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label>Question </label>

                                                        </div>
                                        
                                                        <div class="form-group">
                                                            <label>File</label>
                                                            <input type="file" class="form-control"
                                                            placeholder="File" name="doc_file"
                                                            value="{{ $question->doc_file }}" required>

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

    <div class="modal fade " id="questionModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="question">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Meetings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Question </label>

                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" class="form-control"
                            placeholder="File" name="doc_file"
                            required>

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
@section('scripts')
  <!-- jquery vendor -->

  <script src="{{asset('assets/js/lib/rating1/jRate.min.js')}}"></script>
  <script src="{{asset('assets/js/lib/rating1/jRate.init.js')}}"></script>
@endsection

