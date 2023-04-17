@extends('frontend.app')
@section('content')
    <!-- CAROUSEL -->
    <section id="slider" class="home-banner no-padding">
        <div class="home_page_slider">
            @foreach ($sliders as $slider)
                <div class="item">
                    <figure class="{{ $slider->title != '' || $slider->tagline != '' ? '' : 'nobefore' }}">
                        <img alt="" src="{{ asset('images/slider/' . $slider->image) }}">
                    </figure>
                    @if ($slider->title != '' || $slider->tagline != '')
                        <div class="description text-light">
                            <h1 class="product-category">{!! $slider->title !!}</h1>
                            <h4>{{ $slider->tagline }}</h4>
                            @if ($slider->button_name != '' && $slider->button_url != '')
                                <a class="btn btn-primary m-t-50"
                                    href="{{ $slider->button_url }}">{{ $slider->button_name }}</a>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
    <!-- end: CAROUSEL -->
    <!--------------------------- about --------------------------->
    <section class="about-section">
        <div class="foreground-image"><img src="{{ asset('images/about-bg.svg') }}" alt="Green City Em School" /></div>
        <div class="foreground-image foreground-image1"><img src="{{ asset('images/about-bg1.svg') }}"
                alt="Green City Em School" /></div>
        <div class="inner">
            <div class="container">
                <h2 class="text-center h1 page-title"><span>About</span>
                    Green City Em School</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis enim
                    ornare at. Nulla fringilla turpis nec libero feugiat, nec pellentesque dolor imperdiet. Vestibulum
                    volutpat libero non magna dapibus fermentum. Sed molestie felis elementum, sodales massa a, tempus sem.
                    Sed accumsan ex ligula, id sagittis justo consectetur et. Fusce fermentum laoreet diam in blandit. Nunc
                    vestibulum nibh vel volutpat interdum. Donec elit turpis, gravida non placerat nec, laoreet sit amet
                    dolor. Donec volutpat dui in felis lobortis porta. </p>
                <div class="row align-items-center about-items">
                    <div class="col-md-4">
                        <div class="green-card">
                            <div class="green-inner">
                                <figure><img src="http://127.0.0.1:8000/images/slider/dz30wsoti.jpg" alt="">
                                </figure>
                                <h4>Teaching at Visakhapatnam</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio,
                                    in mollis enim ornare at. Nulla fringilla turpis nec libero feugiat....</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="green-card">
                            <div class="green-inner">
                                <figure><img src="http://127.0.0.1:8000/images/slider/dz30wsoti.jpg" alt="">
                                </figure>
                                <h4>Teaching at Visakhapatnam</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio,
                                    in mollis enim ornare at. Nulla fringilla turpis nec libero feugiat....</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="green-card">
                            <div class="green-inner">
                                <figure><img src="http://127.0.0.1:8000/images/slider/dz30wsoti.jpg" alt="">
                                </figure>
                                <h4>Teaching at Visakhapatnam</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio,
                                    in mollis enim ornare at. Nulla fringilla turpis nec libero feugiat....</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center m-t-50">
                    <a class="btn btn-primary" href="#">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!--------------------------- end about --------------------------->
    <!---------------------------  facilities --------------------------->
    <section class="facilities-section">
        <div class="container">
            <h2 class="text-center h1 page-title"><span>Our</span>
                Facilities</h2>
            <div class="facilities-list">
                <div class="row align-items-center item ">
                    <div class="col-md-6 pic">
                        <figure><img src="http://127.0.0.1:8000/images/slider/dz30wsoti.jpg" alt=""></figure>
                    </div>
                    <div class="col-md-6 content">
                        <h3 class="h1">Table Tennis</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis
                            enim ornare at. Nulla fringilla turpis nec libero feugiat. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis enim ornare at. Nulla
                            fringilla turpis nec libero feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Aliquam cursus tristique odio, in mollis enim ornare at. Nulla fringilla turpis nec libero
                            feugiat.</p>
                        <a class="btn btn-primary" href="#">Read More</a>
                    </div>
                </div>
                <div class="row align-items-center item ">
                    <div class="col-md-6 pic">
                        <figure><img src="http://127.0.0.1:8000/images/slider/dz30wsoti.jpg" alt=""></figure>
                    </div>
                    <div class="col-md-6 content">
                        <h3 class="h1">Table Tennis</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis
                            enim ornare at. Nulla fringilla turpis nec libero feugiat. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis enim ornare at. Nulla
                            fringilla turpis nec libero feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Aliquam cursus tristique odio, in mollis enim ornare at. Nulla fringilla turpis nec libero
                            feugiat.</p>
                        <a class="btn btn-primary" href="#">Read More</a>
                    </div>
                </div>
                <div class="row align-items-center item ">
                    <div class="col-md-6 pic">
                        <figure><img src="http://127.0.0.1:8000/images/slider/dz30wsoti.jpg" alt=""></figure>
                    </div>
                    <div class="col-md-6 content">
                        <h3 class="h1">Table Tennis</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis
                            enim ornare at. Nulla fringilla turpis nec libero feugiat. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Aliquam cursus tristique odio, in mollis enim ornare at. Nulla
                            fringilla turpis nec libero feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Aliquam cursus tristique odio, in mollis enim ornare at. Nulla fringilla turpis nec libero
                            feugiat.</p>
                        <a class="btn btn-primary" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="text-center m-t-70">
                <a href="#" class="btn btn-primary">View More</a>
            </div>
        </div>
    </section>
    <!--------------------------- end facilities --------------------------->
    <!---------------------------  calendar --------------------------->
    <section class="calendar">
        <div class="foreground-image"><img src="{{ asset('images/cal-bg.svg') }}" alt="Green City Em School" /></div>
        <div class="foreground-image foreground-image1"><img src="{{ asset('images/cal-bg1.svg') }}"
                alt="Green City Em School" /></div>
        <div class="calendar-inner">
            <div class="container">
                <div class="calendar-item">
                    <h2 class="h1 m-b-70">Calender</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="calender-list">
                                <h3>List of 2023 Events</h3>
                                <ul>
                                    <li><a href="#">Cultural Fest</a></li>
                                    <li><a href="#">Science Exhibition</a></li>
                                    <li><a href="#">Creative Writing and Reading</a></li>
                                    <li><a href="#">Fancy Dress</a></li>
                                    <li><a href="#">Quiz Competition</a></li>
                                    <li><a href="#">Celebrating Festivals</a></li>
                                    <li><a href="#">Planting activities</a></li>
                                    <li><a href="#">Painting</a></li>
                                    <li><a href="#">Annual day celebration</a></li>
                                    <li><a href="#">Picnic</a></li>
                                    <li><a href="#">Sports day</a></li>

                                    <li><a href="#">Visiting Museums and Monuments</a></li>
                                    <li><a href="#">Treasure hunt</a></li>




                                </ul>
                            </div>
                        </div>
               
                    <div class="col-md-8">
                        <div id="calendar"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------------------- end calendar --------------------------->
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
                                        <h2><a href="{{ url('event/' . $event->slug) }}">{{ $event->event_name }}</a>
                                        </h2>
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
                                    <i class="fa fa-calendar-alt"
                                        aria-hidden="true"></i>{{ formatDate($new->created_at) }}
                                </span>
                                <a href="{{ url('latest-news/' . $new->id) }}" class="readmore fright"
                                    tabindex="0">Read
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
                                                    src="{{ asset('images/gallery/' . $gallery->image) }}"
                                                    alt="">
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
