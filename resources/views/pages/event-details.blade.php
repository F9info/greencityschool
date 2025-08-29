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
                            <div class="event-gallery">
                                <h3 class="subtilte">Event Gallery:</h3>
                                @php $galleryImages = is_array($event->event_gallery) ? $event->event_gallery : []; @endphp
                                @if (!empty($galleryImages))
                                    <div class="grid-layout grid-3-columns" data-item="grid-item" data-margin="30" data-lightbox="gallery">
                                        @foreach ($galleryImages as $gal)
                                            @if (!empty($gal))
                                                <div class="grid-item ">
                                                    <figure class="fig_pic"><img class="w-100" src="{{ asset('images/events/' . $gal) }}" alt="{{ $event->event_name }}">
                                                    <a class="full-link" title="{{ $event->event_name }}" data-lightbox="gallery-image" href="{{ asset('images/events/' . $gal) }}"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    </figure>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
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
                                    {{ date('D d M Y', strtotime($event->start_date)) }}
                                </li>
                               
                            </ul>
                            {!! $event->event_description !!}




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
