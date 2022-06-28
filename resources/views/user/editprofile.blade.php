@extends('layouts.master')

@section('title', 'Edit Profile')
@section('heading', 'Edit Profile')
@section('content')
@php
 $client_id=\App\Models\Client::where('user_id',\Illuminate\Support\Facades\Auth::id())->pluck('id')->first();

@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Edit Profile</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="{{route('Clients.update',$client->id)}}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="row">


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="{{$client->user->firstName}}" name="firstName">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="{{$client->user->lastName}}" name="lastName">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" class="form-control"value="{{$client->user->email}}" type="email" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <label>WC ID</label>
                                    <input id="wc_id " class="form-control"value="{{$client->wc_id }}" type="text" placeholder="WC Id" name="wc_id">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        @php
                                            $eduDropdown = App\Models\Dropdown::with('items')
                                                ->where('name', 'Gender')
                                                ->first();
                                        @endphp
                                        @foreach ($eduDropdown->items as $row)
                                            <option value="{{ $row->item }}" {{($client->gender==$row->item)?"selected":""}}>{{ $row->item }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Immegration Status</label>
                                    <select class="form-control" name="immigrationStatus">
                                        @php
                                            $eduDropdown = App\Models\Dropdown::with('items')
                                                ->where('name', 'Immigration Status')
                                                ->first();
                                        @endphp
                                        @foreach ($eduDropdown->items as $row)
                                            <option value="{{ $row->item }}" {{($client->immigrationStatus==$row->item)?"selected":""}}>{{ $row->item }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" value="{{$client->dob}}" name="dob">
                                </div>
                                <div class="form-group">
                                    <label>Date of Assingment</label>
                                    <input type="date" class="form-control" value="{{$client->doa}}" name="doa">
                                </div>




                                <div class="form-group">
                                    <label>Englsh Proficiency</label>
                                    <select class="form-control" name="engProficiency">
                                        @php
                                            $eduDropdown = App\Models\Dropdown::with('items')
                                                ->where('name', 'Language Proficiency')
                                                ->first();
                                        @endphp
                                        @foreach ($eduDropdown->items as $row)
                                            <option value="{{ $row->item }}" {{($client->engProficiency==$row->item)?"selected":""}}>{{ $row->item }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Mother Tongue</label>
                                    <select class="form-control" name="motherTongue">

                                        @foreach (App\Models\Language::all() as $row)
                                            <option value="{{ $row->language }}" {{($client->motherTongue==$row->language)?"selected":""}}>{{ $row->language }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Childcare Needed</label>&nbsp
                                    <div class="form-check-inline">

                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="childcareNeeded" value="0" {{($client->childcareNeeded==0)?"checked":""}}>No
                                        </label>
                                      </div>
                                      <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="childcareNeeded" value="1" {{($client->childcareNeeded==1)?"checked":""}}>Yes
                                        </label>
                                      </div>

                                </div>
                                <div class="form-group">
                                    <label>Interpreter Needed</label>&nbsp
                                    <div class="form-check-inline">

                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="interpreterNeeded" value="0" {{($client->interpreterNeeded==0)?"checked":""}}>No
                                        </label>
                                      </div>
                                      <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="interpreterNeeded" value="1" {{($client->interpreterNeeded==1)?"checked":""}}>Yes
                                        </label>
                                      </div>

                                </div>
                                <div class="form-group">
                                    <label>Interpreter Language</label>
                                    <select class="form-control" name="interpreterLanguage">

                                        @foreach (App\Models\Language::all() as $row)
                                            <option value="{{ $row->language }}" {{($client->interpreterLanguage==$row->language)?"selected":""}}>{{ $row->language }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Primary Phone</label>
                                    <input type="text" class="form-control" value="{{$client->phonePrimary}}" name="phonePrimary">
                                </div>
                                <div class="form-group">
                                    <label>Secondary Phone</label>
                                    <input type="text" class="form-control" value="{{$client->phoneSecondary}}" name="phoneSecondary">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="{{$client->city}}" name="city">
                                </div>
                                <div class="form-group">
                                    <label>Province</label>
                                    <input type="text" class="form-control" value="{{$client->province}}" name="province">
                                </div>
                                <div class="form-group">
                                    <label>Country Origin</label>
                                    <input type="text" class="form-control" value="{{$client->countryOrigin}}" name="countryOrigin">
                                </div>
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" value="{{$client->postalCode}}" name="postalCode">
                                </div>

                                <div class="form-group">
                                    <label>Street Address</label>
                                    <textarea class="form-control" rows="3"placeholder="Street Address..." name="streetAddress">{{$client->streetAddress}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control" rows="3"placeholder="Notes." name="notes">{{$client->notes}}</textarea>
                                </div>
                                <div class="form-group float-right mt-4">
                                    <label>&nbsp</label>
                                    <button type="submit"  class="btn btn-success">Update</button>
                                 </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
