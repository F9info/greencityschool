@extends('frontend.app')
@section('content')
    <!-- CAROUSEL -->
    <section class="home-banner no-padding">
        <div class="home_page_slider">
            @foreach ($sliders as $slider)
                <div class="item">
                    <figure class="{{ $slider->title != '' || $slider->tagline != '' ? '' : 'nobefore' }}">
                        <img alt="" src="{{ asset('images/slider/' . $slider->image) }}">
                    </figure>
                    @if ($slider->title != '' || $slider->tagline != '')
                        <div class="description">
                            <h1 class="product-category">{{ $slider->title }}</h1>
                            <h3>{{ $slider->tagline }}</h3>
                            @if ($slider->button_name != '' && $slider->button_url != '')
                                <a class="btn btn-primary" href="{{ $slider->button_url }}">{{ $slider->button_name }}</a>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
    <!-- end: CAROUSEL -->
    <!--------------------------- home_events --------------------------->
    <section class="home_events text-center home_page_events event_lists ">
        <div class="container">
            <div class="inner">
                <h2 class="home-title">Latest Events</h2>
                @if ($events->count() > 0)
                    <div class="home_events_slider">
                        @foreach ($events as $event)
                            <!-- Post item-->
                            <div class="post-item shadow">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="{{ url('event/' . $event->slug) }}">
                                            <figure>
                                                <img alt="" src="{{ asset('images/events/' . $event->image) }}">
                                            </figure>
                                        </a>
                                        <span class="post-meta-category"><a
                                                href="">{{ $event->eventCategory->name }}</a></span>
                                    </div>
                                    <div class="post-item-description">
                                        <h2><a href="{{ url('event/' . $event->slug) }}">{{ $event->event_name }}</a></h2>
                                        <div class="disc">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($event->event_description), $limit = 120, $end = '...') !!}
                                        </div>
                                        <div class="date_event">
                                            <span class="material-symbols-outlined">
                                                event
                                            </span>
                                            {{ date('D d M Y', strtotime($event->start_date)) . ' to ' . date('D d M Y', strtotime($event->end_date)) }}
                                        </div>
                                        <div class="buttons">
                                            @include('pages.event-register-btn', ['event', $event])
                                            <a href="{{ url('event/' . $event->slug) }}" class="readmore fright"
                                                tabindex="0">Read More</a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post item-->
                        @endforeach
                    </div>
                @else
                    <h3 align="center">No Latest Events Found</h3>
                @endif
            </div>
        </div>
    </section>
    <!--------------------------- mission-block --------------------------->
    {{--
<section class="mission-block "
style="background-image: url({{ asset('images/site-images/' . applicationSettings('welcome-image')) }});"> --}}
    <section class="mission-block ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <figure><img src="{{ asset('images/site-images/' . applicationSettings('welcome-image')) }}"></figure>
                </div>
                <div class="col-lg-6 content">
                    <h2>{{ applicationSettings('welcome-title') }}</h2>
                    <div class="content_page missonBlock">
                        {!! applicationSettings('welcome-descrition') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------------------- home_news --------------------------->
    <section class="home_events home_news text-center">
        <div class="container">
            <h2 class="home-title">NEWS</h2>
            <div class="home_events_slider ">
                @foreach ($news as $new)
                    <!-- Post item-->
                    <div class="post-item shadow">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="{{ url('latest-news/' . $new->id) }}">
                                    <img alt="" src="{{ asset('images/news/' . $new->image) }}">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h2><a href="{{ url('latest-news/' . $new->id) }}">{{ $new->title }}</a></h2>
                                {!! \Illuminate\Support\Str::limit($new->description, $limit = 180, $end = '...') !!}
                            </div>
                            <div class="buttons">
                                <span class="post-meta-date">
                                    <i class="fa fa-calendar-alt" aria-hidden="true"></i>{{ formatDate($new->created_at) }}
                                </span>
                                <a href="{{ url('latest-news/' . $new->id) }}" class="readmore fright" tabindex="0">Read
                                    More</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                @endforeach
            </div>
        </div>
    </section>
    <!--------------------------- sponser-block --------------------------->
    @include('pages.sponsors')
    <!--------------------------- home-galley --------------------------->
    <section class="home-galley text-center">
        <div class="container">
            <h2 class="home-title">Events Gallery</h2>
            @if ($photoCategories != '')
                <div class="home-photo-gallery">
                    @foreach ($photoCategories as $photoCategory)
                        @if ($photoCategory->activePhotoGalleries->count() > 0)
                            <div class="row justify-content-center">
                                @foreach ($photoCategory->activePhotoGalleries as $gallery)
                                    <div class="col-lg-4 block">
                                        <div class="card">
                                            <figure> <img class="card-img-top"
                                                    src="{{ asset('images/gallery/' . $gallery->image) }}" alt="">
                                            </figure>
                                            <div class="card-body-01">
                                                <h5 class="card-title">{{ $gallery->title }}</h5>
                                                <a href="{{ $gallery->image_url }}" class="btn btn-primary btn-xs"
                                                    target="_blank">View Photos</a>
                                            </div>
                                        </div>
                                        <a class="full_link" href="{{ $gallery->image_url }}" target="_blank">&nbsp;</a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!--------------------------- subscribe_block --------------------------->
    @include('pages.subscribe')
    <!--------------------------- media-partners-block --------------------------->
    @include('pages.media-partners')
    <!--------------------------- end --------------------------->
    @if (session('memberId'))
        <!-- Modal -->
        <div id="modal-auto-open" class="modal modal-auto-open text-center cookie-notify" data-delay="500"
            data-cookie-enabled="false">
            <span class="material-symbols-outlined colorgreen" style=" font-size:5em;">
                check_circle
            </span>
            <h2 class="modal-title">Member Registration Successful</h2>
            <p>
                Thank you for registering as a member of F9 Info Technologies.<br>
                <b>Your membership Id is: <span style="color: #eb6001;">{{ session('memberId') }}</span><br>
                    A confirmation email has been sent to your email address.
            </p>
            <a class="btn btn-primary modal-close" href="#">Dismiss</a>
        </div>
    @endif
    @if (session('eventregistration'))
        <!-- Modal -->
        <div id="modal-auto-open" class="modal modal-auto-open text-center cookie-notify" data-delay="500"
            data-cookie-enabled="false">
            <span class="material-symbols-outlined colorgreen" style=" font-size:5em;">
                check_circle
            </span>
            <h2 class="modal-title">Event Registration Successful</h2>
            <p>
                Thank you for event registration.<br>
                A confirmation email has been sent to your email address.
            </p>
            <a class="btn btn-primary modal-close" href="#">Dismiss</a>
        </div>
    @endif
@endsection
