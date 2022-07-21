
          
<div class="row">
   <div class="col-lg-3">
   </div>
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                   <!--  <div class="row">
                    
                      <div class="col-lg-8"> -->
                        <div class="user-profile-name">{{$event->title}}</div>

                        <div class="user-Location">
                          <i class="ti-location-pin"></i> {{$event->groupActivity->location}}</div>
                          <a  href="javascript:;"onclick="javascript:$('#eventModal').hide()" class="float-right"><i class="ti-close" ></i></a>
                        <div class="user-job-title">{{$event->type}}</div>
                   
                        <div class="user-send-message">
                        	@if($event->serviceDelivery=="Video Portal")
                          <a class="btn btn-success btn-addon btn-small" href="{{$event->meetingLink}}">
                          	
                            <i class="ti-briefcase"></i> Join Event</a>
                             @endif
                        </div>
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About Event</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4>Event Schedule</h4>
                                <div class="phone-content">
                                  <span class="contact-title">Program :</span>
                                  <span class="phone-number">{{$event->groupActivity->programName}}</span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">Start:</span>
                                  <span class="mail-address">{{ date("F j, Y, g:i a", strtotime($event->start)) }}</span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">End:</span>
                                  <span class="mail-address">{{ date("F j, Y, g:i a", strtotime($event->end)) }}</span>
                                </div>
                               
                              
                              </div>
                              <div class="basic-information">
                                <h4>Event information</h4>
                                

                                 <div class="birthday-content">
                                  <span class="contact-title">Type:</span>
                                  <span class="birth-date">{{$event->groupActivity->type}} </span>
                                </div>
                                 <div class="birthday-content">
                                  <span class="contact-title">Service Delivery:</span>
                                  <span class="birth-date">{{$event->serviceDelivery}} </span>
                                </div>
                                 <div class="birthday-content">
                                  <span class="contact-title">Funder:</span>
                                  <span class="birth-date">{{$event->groupActivity->funder}} </span>
                                </div>

                               
                              </div>
                            </div>
                          </div>
                        </div>
                     <!--  </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          
