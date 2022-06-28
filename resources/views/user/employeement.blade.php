@extends('layouts.master')

@section('title', 'Employeement')
@section('heading', 'Employeement')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>My employeements</h4>
                    <a href='#' class="btn btn-primary float-right" data-toggle="modal" data-target="#employeementModel">Add <i
                            class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NOC</th>
                                    <th>Job Title</th>
                                    <th>Years of Experience</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($myEmployeement)>0)


                                @foreach ($myEmployeement as $employeement)
                                    <tr>

                                        <td>{{ $employeement->currentnoc->code }}-{{ $employeement->currentnoc->title }}</td>
                                        <td>{{ $employeement->job_title }}</td>
                                        <td>{{ $employeement->experience_years }}</td>
                                        <td>{{ $employeement->country }}</td>
                                        <td>
                                         <div class="row float-right">

                                            <div class="col-sm-6">   <form id="deleteemployeementForm{{ $employeement->id}}" action="{{route('Employeement.destroy',$employeement->id)}}" method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                <button class="btn btn-danger btn-sm" type="button" onclick="javascript:(confirm('Do you want to delete ?'))?
                                                document.getElementById('deleteemployeementForm{{ $employeement->id}}').submit():''"><i class="fa fa-trash" ></i></button>
                                                </form>
                                            </div>
                                            <div class="col-sm-6">
                                                    <a href="javascript:;" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#employeementModelEdit{{ $employeement->id}}"><i
                                                        class="fa fa-edit"></i>
                                                    </a>
                                            </div>

                                        </div>
                                    </td>

                                    </tr>

                                    <div class="modal fade" id="employeementModelEdit{{ $employeement->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{route('Employeement.update',$employeement->id)}}" method="POST">
                                            @method("PUT")
                                            @csrf
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit {{$employeement->job_title}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Job Title</label>
                                                            <input type="text" name="job_title" class="form-control" placeholder="Job Titlt"
                                                                value="{{ $employeement->job_title}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NOC</label>
                                                            <input type="hidden" name="id" value="{{$employeement->id}}">
                                                            <select class="form-control"  name="current_noc" >
                                                                @foreach (App\Models\Noc::all() as $row)
                                                                    <option value="{{ $row->id }}" {{ ($row->id == $employeement->currentnoc->id)?"selected":"" }}>{{ $row->code }} {{ $row->title }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select class="form-control"  name="country">
                                                                @foreach (App\Models\Country::all() as $row)
                                                                    <option value="{{ $row->name }}"
                                                                        {{ ($row->name == $employeement->country) ? "selected":""}}>
                                                                        {{ $row->name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Year Of experience</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Years of Experience" name="experience_years"
                                                                value="{{ $employeement->experience_years}}" required>
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
                                @else
                                <tr>
                                 <td colspan="5" class="text-dark">No Records Found</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="employeementModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add employeement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Employeement.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" name="job_title" class="form-control" placeholder="Job Title" required
                               >
                        </div>
                        <div class="form-group">
                            <label>NOC</label>
                            <select class="form-control"  name="current_noc" >
                                @foreach (App\Models\Noc::all() as $row)
                                    <option value="{{ $row->id }}" >{{ $row->code }} {{ $row->title }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control"  name="country">
                                @foreach (App\Models\Country::all() as $row)
                                    <option value="{{ $row->name }}" >{{ $row->name }} </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Year Of experience</label>
                            <input type="text" class="form-control"
                                placeholder="Years of Experience" name="experience_years" required
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
