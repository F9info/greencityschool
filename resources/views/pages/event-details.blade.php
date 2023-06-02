@extends('frontend.app')
@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
        <figure>
            @if (applicationSettings('event-details-banner') != '')
                <img src="{{ asset('images/site-images/' . applicationSettings('event-details-banner')) }}"
                    alt="{!! applicationSettings('site-name') !!}">
            @else
                <img src="{{ asset('images/site-images/' . applicationSettings('inner-banner')) }}"
                    alt="{!! applicationSettings('site-name') !!}">
            @endif
        </figure>
    </div>
    <!-- end: Page title -->
    <section class="event_detail">
        <div class="container">
            @if ($event != null)
                <div class="card">
                    <div class="row">
                        <div class="col-md-7 pic">
                            <figure><img width="100%" alt="{{ $event->event_name }}"
                                    src="{{ asset('images/events/' . $event->image) }}"></figure>
                            <div class="description">
                                <h3 class="subtilte">About the event:</h3>
                                {!! $event->event_description !!}
                            </div>
                        </div>
                        <div class="col-md-5 text">
                            <div class="text-inner">
                            <h1 class="color-primary inner-title h2">{{ $event->event_name }}</h1>
                            <ul class="event-detail-list">
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
                            @include('pages.event-register-btn', ['event', $event])
                            @if ($event->registration_note != '')
                            <div class="item">
                                <h3 class="subtilte">Registration note:</h3>
                                {!! $event->registration_note !!}
                            </div>
                        @endif
                        </div>
                    </div>
                    </div>
                </div>
            @else
                <h3 align="center">No Event Details Found</h3>
            @endif
        </div>
    </section>
@endsection
