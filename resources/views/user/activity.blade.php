@extends('layouts.master')

@section('title', 'Activity')
@section('heading', 'Activity')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Group Activities</h4>
                    <a href='#' class="btn btn-primary float-right" data-toggle="modal" data-target="#educationModel">Add
                        <i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Activity Type</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Funder</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myEducation as $education)
                                    <tr>

                                        <td>{{ $education->type }}</td>
                                        <td>{{ $education->major }}</td>
                                        <td>{{ $education->graduation_date }}</td>
                                        <td>{{ $education->education_country }}</td>
                                        <td>
                                            <div class="row float-right">

                                                <div class="col-sm-2">
                                                    <form id="deleteEducationForm{{ $education->id }}"
                                                        action="{{ route('Education.destroy', $education->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="button"
                                                            onclick="javascript:(confirm('Do you want to delete ?'))?
                                                document.getElementById('deleteEducationForm{{ $education->id }}').submit():''"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-2"> <a href="javascript:;" class="btn btn-info"
                                                        data-toggle="modal"
                                                        data-target="#educationModelEdit{{ $education->id }}"><i
                                                            class="fa fa-edit"></i>
                                                    </a></div>
                                                <div class="col-sm-2">
                                                    <form action="{{ route('Education.setHigh') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $education->id }}">
                                                        <button class="btn btn-success" type="submit">Set High <i
                                                                class="fa fa-plus"></i></button>
                                                    </form>
                                                </div>
                                            </div>




                                        </td>

                                    </tr>

                                    <div class="modal fade" id="educationModelEdit{{ $education->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{ route('Education.update', $education->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit
                                                            {{ $education->major }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label>Level Of Education</label>
                                                            <input type="hidden" name="id"
                                                                value="{{ $education->id }}">
                                                            <select class="form-control" name="education_level">
                                                                @php
                                                                    $eduDropdown = App\Models\Dropdown::with('items')
                                                                        ->where('name', 'Level of Education')
                                                                        ->first();
                                                                @endphp
                                                                @foreach ($eduDropdown->items as $row)
                                                                    <option value="{{ $row->item }}">
                                                                        {{ $row->item }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="form-control" name="education_country">
                                                                @foreach (App\Models\Country::all() as $row)
                                                                    <option value="{{ $row->name }}"
                                                                        {{ $row->name == $education->education_country }}>
                                                                        {{ $row->name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Major</label>
                                                            <input type="text" name="major" class="form-control"
                                                                placeholder="Major" value="{{ $education->major }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Graduation Year</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Graduation Year" name="graduation_date"
                                                                value="{{ $education->graduation_date }}">
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

    <div class="modal fade " id="educationModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Education.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Level Of Education</label>
                            <select class="form-control" name="education_level">
                                @php
                                    $eduDropdown = App\Models\Dropdown::with('items')
                                        ->where('name', 'Level of Education')
                                        ->first();
                                @endphp
                                @foreach ($eduDropdown->items as $row)
                                    <option value="{{ $row->item }}">{{ $row->item }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control" name="education_country">
                                @foreach (App\Models\Country::all() as $row)
                                    <option value="{{ $row->name }}"
                                        {{ $row->name == $education->education_country }}>
                                        {{ $row->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Major</label>
                            <input type="text" class="form-control" placeholder="Major" name="major">
                        </div>
                        <div class="form-group">
                            <label>Graduation Year</label>
                            <input type="text" class="form-control" placeholder="Graduation Year"
                                name="graduation_date">
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
    <script>
        function delete(e) {
            confirm('Do you want to delete ?');

            //    if(confirm('Do you want to delete ?')){
            //     $('form[name=deleteEducation]').submit();
            //    }
            //    else{
            //     e.preventDefault();
            //    }
        }
    </script>
@endsection
