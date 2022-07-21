
<div class="row">
  <div class="col-lg-3">
  </div>
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                    
                      <div class="col-lg-12">
                        <div class="user-profile-name">{{$meeting->staff->user->firstName}} {{$meeting->staff->user->lastName}}</div>
                        <div class="user-Location">
                          <i class="ti-location-pin"></i> {{$meeting->location}}</div>
                           <a  href="javascript:;"onclick="javascript:$('#meetingModal').hide()" class="float-right"><i class="ti-close" ></i></a>
                        <div class="user-job-title">Facilitator</div>
                      <!--   <div class="ratings">
                          <h4>Ratings</h4>
                          <div class="rating-star">
                            <span>8.9</span>
                            <i class="ti-star color-primary"></i>
                            <i class="ti-star color-primary"></i>
                            <i class="ti-star color-primary"></i>
                            <i class="ti-star color-primary"></i>
                            <i class="ti-star"></i>
                          </div>
                        </div> -->
                        <div class="user-send-message">
                        	@if($meeting->serviceDelivery=="Video Portal")
                          <a class="btn btn-success btn-addon btn-small" href="{{$meeting->meetingLink}}">
                          	
                            <i class="ti-briefcase"></i> Join Meeting</a>
                             @endif
                        </div>
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About Meeting</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4>Meeting Schedule</h4>
                                <div class="phone-content">
                                  <span class="contact-title">Program :</span>
                                  <span class="phone-number">{{$meeting->programName}}</span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">Date:</span>
                                  <span class="mail-address">{{ date("F j, Y, g:i a", strtotime($meeting->date)) }}</span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title">Duration:</span>
                                  <span class="contact-email">{{$meeting->duration}}</span>
                                </div>
                              
                              </div>
                              <div class="basic-information">
                                <h4>Meeting information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title">Service Provided:</span>
                                  <span class="birth-date">{{$meeting->serviceProvided}} </span>
                                </div>

                                 <div class="birthday-content">
                                  <span class="contact-title">Type:</span>
                                  <span class="birth-date">{{$meeting->type}} </span>
                                </div>
                                 <div class="birthday-content">
                                  <span class="contact-title">Service Delivery:</span>
                                  <span class="birth-date">{{$meeting->serviceDelivery}} </span>
                                </div>
                                 <div class="birthday-content">
                                  <span class="contact-title">Funder:</span>
                                  <span class="birth-date">{{$meeting->funder}} </span>
                                </div>

                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
