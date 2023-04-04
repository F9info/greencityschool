@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="main-section dashboard">
            <ul class="dashboard-top_list">
                <li class="active"><a href="{{ route('home') }}"><span class="material-symbols-outlined">
                            dashboard
                        </span> Dashboard</a></li>

                <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ route('users.index') }}"><span
                            class="material-symbols-outlined">
                            group
                        </span> User Management</a></li>

                <li class="{{ Request::is('events*') ? 'active' : '' }}"><a href="{{ route('events.index') }}"><span
                            class="material-symbols-outlined">
                            calendar_month
                        </span> Events</a></li>

                <li class="{{ Request::is('personalDetails*') ? 'active' : '' }}"><a
                        href="{{ route('personalDetails.index') }}"><span class="material-symbols-outlined">
                            stars
                        </span> Members</a></li>

                <li class="{{ Request::is('committeeMembers*') ? 'active' : '' }}"><a
                        href="{{ route('committeeMembers.index') }}"><span class="material-symbols-outlined">
                            diversity_3
                        </span> Committees</a></li>

                <li class="{{ Request::is('photoGalleries*') ? 'active' : '' }}"><a
                        href="{{ route('photoGalleries.index') }}"><span class="material-symbols-outlined">
                            gallery_thumbnail
                        </span> Gallery</a></li>
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="sub-title" style="display: inline;">Statistics</h2>
        
                </div>
                <div class="col-md-12 text-right">
                    <form class="form-horizontal animation-form" id="statsForm" action="" method="GET">
                        @php
                            $searchYear = request()->get('year');
                            $searchMonth = request()->get('month');
                        @endphp
                        
                        <div class="row fillter">
                            <div class="col-md-2"><p>Filter</p></div>
                            <div class="col-md-4 text-left form-group select-area">
                                <select name="month" class="form-control select2" id="month">
                                    <option value="">Select Month</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ $searchMonth == $i ? ' selected' : '' }}>
                                            {{ \Carbon\Carbon::createFromDate(null, $i, null)->format('F') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4 text-left form-group select-area">
                                <select name="year" class="form-control select2" id="year">
                                    <option value="">Select Year</option>
                                    @for ($year = date('Y'); $year >= 2015; $year--)
                                        <option value="{{ $year }}" {{ $searchYear  == $year ? ' selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-md-2 text-left">
                                <a class="{{ request()->get('month') == '' && request()->get('year') == '' ? 'btn btn-secondary  active' : 'btn btn-danger' }}" href="{{ url('admin/dashboard') }}">Reset</a>
                               

                            </div>



                        </div>
                        <p style="display: block; font-size:14px;    margin-top: -30px;     color: #eb6002; text-align:center">Click on the reset button to check current year statistics</p>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 dashboard-right">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Memberships</h3>
                                    <a href="{{ route('personalDetails.index') }}">
                                        <span class="material-symbols-outlined">
                                            open_in_new
                                        </span>
                                    </a>
                                    <div class="clear"></div>
                                </div>
                                <!-- /.card-header -->
                                @if ($membershipTypes != null)
                                    @php($membersCount = 0)
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap">
                                            <tbody>
                                                @foreach ($membershipTypes as $membershipType)
                                                    <tr>
                                                        <td>{{ $membershipType->membership_name }}</td>
                                                        <td>
                                                            <span class="rounded">
                                                                @php($count = ($searchYear == '' && $searchMonth == '') ? $membershipType->personalDetails->count() : $membershipType->monthYearWiseMembers($searchMonth, $searchYear)->count())
                                                                @php($membersCount += $count)
                                                                {{ $count }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <p class="fleft">Total</p>
                                        <p class="fright">{{ $membersCount }}</p>
                                        <div class="clear"></div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card -->
                        </div>
                    

                
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Donations</h3>
                                    <a href="{{ route('donations.index') }}">
                                        <span class="material-symbols-outlined">
                                            open_in_new
                                        </span>
                                    </a>
                                    <div class="clear"></div>
                                </div>
                                <!-- /.card-header -->
                                @if ($donationCategories != null)
                                    @php($donationsCount = 0)
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap">
                                            <tbody>
                                                @foreach ($donationCategories as $donationCategory)
                                                    <tr>
                                                        <td>{{ $donationCategory->donation_cause }}</td>
                                                        <td>
                                                            <span class="rounded">
                                                                @php($count = ($searchYear == '' && $searchMonth == '') ? $donationCategory->donations->count() : $donationCategory->monthYearWiseDonations($searchMonth, $searchYear)->count())
                                                                @php($donationsCount += $count)
                                                                {{ $count }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <p class="fleft">Total</p>
                                        <p class="fright">{{ $donationsCount }}</p>
                                        <div class="clear"></div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card -->
                        </div>




                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Event Category</h3>
                                    <a href="{{ route('events.index') }}">
                                        <span class="material-symbols-outlined">
                                            open_in_new
                                        </span>
                                    </a>
                                    <div class="clear"></div>
                                </div>
                                <!-- /.card-header -->
                                @if ($eventCategories != null)
                                    @php($eventsCount = 0)
                                    <div class="card-body table-responsive p-0" style="height:140px">
                                        <table class="table table-head-fixed text-nowrap">
                                            <tbody>
                                                @foreach ($eventCategories as $eventCategory)
                                                    <tr>
                                                        <td>{{ $eventCategory->name }}</td>
                                                        <td>
                                                            <span class="rounded">
                                                                @php($count = ($searchYear == '' && $searchMonth == '') ? $eventCategory->events->count() : $eventCategory->monthYearWiseEvents($searchMonth, $searchYear)->count())
                                                                @php($eventsCount += $count)
                                                                {{ $count }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <p class="fleft">Total</p>
                                        <p class="fright">{{ $eventsCount }}</p>
                                        <div class="clear"></div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card -->
                        </div>


                        <div class="col-md-4 dashboard-left">
                            <div class="inner main_inner">  <div class="info-box block">
                                <div class="inner ">
                                    <div class="circle">
                                        <div class="pie-wrapper progress-75 style-2 set-size">
                                            <span class="label">{{ $sponsors }}</span>
                                            <div class="pie">
                                                <div class="left-side half-circle"></div>
                                                <div class="right-side half-circle"></div>
                                            </div>
                                            <div class="shadow"></div>
                                        </div>
                                    </div>
                                    <p>No of Sponsers</p>
                                </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-md-4 dashboard-left">
                            <div class="inner main_inner">   <div class="info-box block">
                                <div class="inner ">
                                    <div class="circle">
                                        <div class="pie-wrapper progress-75 style-2 set-size">
                                            <span class="label">{{ $donations }}</span>
                                            <div class="pie">
                                                <div class="left-side half-circle"></div>
                                                <div class="right-side half-circle"></div>
                                            </div>
                                            <div class="shadow"></div>
                                        </div>
                                    </div>
                                    <p>No of Donors</p>
                                </div>
                            </div>
                        </div>
                        </div>








                    </div>

                </div>

                <div class="col-md-12 mt-5">
                    <hr/>
                </div>

                <div class="col-md-12 mb-3 mt-5">
                <h2 class="sub-title " style="display: inline;">Annual Statistics</h2>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Latest Events
                                <span>( Registration Count )</span>
                            </h3>
                            <a href="{{ route('events.index') }}">
                                <span class="material-symbols-outlined">
                                    open_in_new
                                </span>
                            </a>
                            <div class="clear"></div>
                        </div>
                        <!-- /.card-header -->
                        @if ($upcomingEvents != null)
                            @php($eventRegistrationsCount = 0)
                            <div class="card-body table-responsive p-0" style="height:200px">
                                <table class="table table-head-fixed text-nowrap">
                                    <tbody>
                                        @foreach ($upcomingEvents as $upcomingEvent)
                                            <tr>
                                                <td>{{ $upcomingEvent->event_name }}</td>
                                                <td>
                                                    <span class="rounded">
                                                        @php($count = $upcomingEvent->eventRegistrations->count())
                                                        @php($eventRegistrationsCount += $count)
                                                        {{ $count }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p class="fleft">Total</p>
                                <p class="fright">{{ $eventRegistrationsCount }}</p>
                                <div class="clear"></div>
                            </div>
                        @endif
                    </div>
                    <!-- /.card -->
                </div>



<div class="col-md-4 dashboard-left">       <div class="card card-widget widget-user block">

    <div class="widget-user-header bg-primary">
        <h3 class="widget-user-username">Members</h3>
        <h5 class="widget-user-desc">Active / Expired</h5>
    </div>
    <div class="widget-user-image">
        <span class="material-symbols-outlined">
            group
        </span>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-6 border-right">
                <div class="description-block">
                    <h5 class="description-header">{{ $activeUsers }}</h5>
                    <span class="description-text">Active</span>
                </div>

            </div>



            <div class="col-sm-6">
                <div class="description-block">
                    <h5 class="description-header">{{ $expireUsers }}</h5>
                    <span class="description-text">Expired</span>
                </div>

            </div>

        </div>

    </div>
</div></div>




            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#year, #month').on('change', function() {
                $('#statsForm').submit();
            });
        });
    </script>
@endpush