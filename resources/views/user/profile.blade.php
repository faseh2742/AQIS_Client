@extends('layouts.master')

@section('title', 'Profile')
@section('heading', 'Profile')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="user-profile">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="user-profile-name">{{$profile->firstName}} {{$profile->lastName}}</div>

                                    <a href="{{route('Clients.edit',$profile->client->id)}}" class="btn btn-info btn-sm float-right">Edit Profile <i class="fa fa-edit"></i></a>


                                <div class="user-Location">
                                    <i class="ti-location-pin"></i>{{$profile->client->streetAddress}}
                                </div>
                                <div class="user-job-title">Client</div>

                                <div class="custom-tab user-profile-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="1">
                                            <div class="contact-information">
                                                <h4>Contact information</h4>
                                                <div class="email-content">
                                                    <span class="contact-title">Email:</span>
                                                    <span class="contact-email">{{$profile->email}}</span>
                                                </div>
                                                <div class="phone-content">
                                                    <span class="contact-title">Primary Phone:</span>
                                                    <span class="phone-number">{{$profile->client->phonePrimary}}</span>
                                                </div>
                                                <div class="website-content">
                                                    <span class="contact-title">Secondary Phone:</span>
                                                    <span class="contact-website">{{$profile->client->phoneSecondary}}</span>
                                                </div>
                                                <div class="address-content">
                                                    <span class="contact-title">WC ID:</span>
                                                    <span class="mail-address">{{$profile->client->wc_id}}</span>
                                                </div>
                                                <div class="address-content">
                                                    <span class="contact-title">City:</span>
                                                    <span class="mail-address">{{$profile->client->city}}</span>
                                                </div>
                                                <div class="address-content">
                                                    <span class="contact-title">Country :</span>
                                                    <span class="mail-address">{{$profile->client->countryOrigin}}</span>
                                                </div>
                                                <div class="address-content">
                                                    <span class="contact-title">Province:</span>
                                                    <span class="mail-address">{{$profile->client->province}}</span>
                                                </div>
                                                <div class="address-content">
                                                    <span class="contact-title">Address:</span>
                                                    <span class="mail-address">{{$profile->client->streetAddress}}</span>
                                                </div>



                                            </div>
                                            <div class="basic-information">
                                                <h4>Basic information</h4>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Birthday:</span>
                                                    <span class="birth-date"> {{$profile->client->dob}} </span>
                                                </div>
                                                <div class="gender-content">
                                                    <span class="contact-title">Gender:</span>
                                                    <span class="gender">{{$profile->client->gender}}</span>
                                                </div>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Mother Tongue:</span>
                                                    <span class="birth-date"> {{$profile->client->motherTongue}} </span>
                                                </div>
                                                <div class="birthday-content">
                                                    <span class="contact-title">English Proficiency:</span>
                                                    <span class="birth-date"> {{$profile->client->engProficiency}} </span>
                                                </div>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Immigration Status:</span>
                                                    <span class="birth-date"> {{$profile->client->immigrationStatus}} </span>
                                                </div>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Interpreter Needed:</span>
                                                    <span class="birth-date"> {{($profile->client->interpreterNeeded)?"Yes" :"NO"}} </span>
                                                </div>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Childcare Needed:</span>
                                                    <span class="birth-date"> {{($profile->client->childcareNeeded)? "Yes" :"NO"}} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="user-skill">
                                    <h4>Notes</h4>
                                    <ul>
                                        <li>
                                           <p>
                                            {{$profile->client->notes}}
                                           </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4"> --}}
                                {{-- <div class="user-photo m-b-30">
                                    <img class="img-fluid" src="{{ asset('assets/images/user-profile.jpg') }}" alt="" />
                                </div> --}}

                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
