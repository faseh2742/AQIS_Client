<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo">
                <a href="index.html">
                    <!-- <img src="assets/images/logo.png" alt="" /> -->
                    <span>AQIS</span>
                </a>
            </div>
            <ul>
                <li class="label">Main</li>
                <li>
                    <a href="{{url('/dashboard')}}">
                        <i class="ti-home"></i> Dashboard</a>
                </li>
                <li class="label">Navigate</li>
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-user"></i> Profile
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('Clients.index')}}"> <i class="ti-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{route('Education.index')}}"> <i class="ti-bag"></i> Education</a>
                        </li>
                        <li>
                            <a href="{{route('Employeement.index')}}"> <i class="ti-briefcase"></i> Employeement</a>
                        </li>
                        {{-- <li>
                            <a href="{{route('Clients.index')}}"> <i class="ti-user"></i> Group Activities</a>
                        </li> --}}
                        <li>
                            <a href="{{route('Training.index')}}"> <i class="ti-blackboard"></i>Training</a>
                        </li>
                        <li>
                            <a href="{{route('Outcome.index')}}"> <i class="ti-check-box"></i>Outcomes</a>
                        </li>
                        <li>
                            <a href="{{route('Document.index')}}"> <i class="ti-file"></i>Documents</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="{{route('Meetings.index')}}">
                        <i class="ti-bookmark"></i> My Meetings</a>
                </li>


                <li>
                    <a  onclick="event.preventDefault();
                    document.getElementById('logout-side').submit();">
                        <i class="ti-close" ></i> Logout
                    </a>
                    <form id="logout-side" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
