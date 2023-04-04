@extends('frontend.app')

@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
        <div class="inner-page-title">
            <h1>About the Event
            </h1>
        </div>
        <figure>
         




                @if (applicationSettings('event-details-banner') != '')
                <img src="{{  asset('images/site-images/' . applicationSettings('event-details-banner')) }}"
                alt="{!! applicationSettings('site-name') !!}">
                @else
                <img src="{{  asset('images/site-images/' . applicationSettings('inner-banner')) }}"
                alt="{!! applicationSettings('site-name') !!}">
                @endif 




        </figure>
    </div>
    <!-- end: Page title -->
    <section class="event_detail">
        <div class="container">
            @if ($event != null)
                <div class="card">
                    <figure> <img alt="" src="{{ asset('images/events/' . $event->image) }}"></figure>
                    <div class="row">
                        <div class="col-md-7 left">
                            <div class="item">
                                <h3 class="subtilte">About the event:</h3>
                                {!! $event->event_description !!}
                            </div>

                            @if ($event->registration_note != '')
                                <div class="item">
                                    <h3 class="subtilte">Registration note:</h3>
                                    {!! $event->registration_note !!}
                                </div>
                            @endif




                        </div>
                        <div class="col-md-5 right">
                            <div class="inner">
                                <h2>{{ $event->event_name }}</h2>
                                <ul>

                                    <li><span class="material-symbols-outlined">
                                            lan
                                        </span>
                                        {{ $event->eventCategory->name }}
                                    </li>
                                    <li><span class="material-symbols-outlined">
                                            event
                                        </span>
                                        {{ date('D d M Y', strtotime($event->start_date)) . ' to ' . date('D d M Y', strtotime($event->end_date)) }}
                                    </li>
                                    <li><span class="material-symbols-outlined">
                                            location_on
                                        </span> {{ $event->location }}</li>
                                    <li><span class="material-symbols-outlined">
                                            event_available
                                        </span>Registration Start Date:
                                        {{ date('D d M Y', strtotime($event->reg_start_date)) }}
                                    </li>
                                    <li><span class="material-symbols-outlined">
                                            event_busy
                                        </span>Registration End Date: {{ date('D d M Y', strtotime($event->reg_end_date)) }}
                                    </li>
                                </ul>
                                <div class="text-center">
                                    @include('pages.event-register-btn', ['event', $event])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3 align="center">No Event Details Found</h3>
            @endif

        </div>
    </section>
    <!--------------------------- sponser-block --------------------------->
    @include('pages.sponsors')
    <!--------------------------- subscribe_block --------------------------->
    @include('pages.subscribe')
    <!--------------------------- media-partners-block --------------------------->
    @include('pages.media-partners')
@endsection
