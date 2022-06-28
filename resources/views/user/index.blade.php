@extends('layouts.master')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('content')


    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-calendar color-success border-success"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Events</div>
                        <div class="stat-digit">{{ App\Models\Event::count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-calendar  color-success border-success"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">My Events</div>
                        <div class="stat-digit">{{ $myEventsCount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-briefcase color-success border-success"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Upcoming Meetings</div>
                        <div class="stat-digit">{{ $upcomingmeetingsCount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-briefcase color-success border-success"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Past Meetings</div>
                        <div class="stat-digit">{{ $pastmeetingsCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
