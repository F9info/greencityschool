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
                <h2 class="text-center h1 page-title">
                    {!! applicationSettings('welcome-title') !!}
                    </h2>
                    {!! applicationSettings('welcome-description') !!}
                <div class="row align-items-center about-items">
                    <div class="col-md-4">
                        <div class="green-card">
                            <div class="green-inner">
                                <figure><img src="{{ asset('images/site-images/' . applicationSettings('welcome-block-one-image')) }}" alt="">
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
            <h2 class="text-center h1 page-title"><span>Our</span> Amenities</h2>
            <div class="facilities-list">
                @foreach ($services as $service)
                <div class="row align-items-center item ">
                    <div class="col-md-6 pic">
                        <figure><img src="{{ asset('images/services/' . $service->image) }}" alt="{!! $service->image_alt_text !!}"></figure>
                    </div>
                    <div class="col-md-6 content">
                        <h3 class="h1">{{ $service->title }}</h3>
                        {!! $service->short_description !!}
                    </div>
                </div>
                @endforeach
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
                <h2 class="h1 home-title m-b-90">Latest Events</h2>
                @if ($events->count() > 0)
                    <div class="home_events_slider">
                        @foreach ($events as $event)
                            <!-- Post item-->
                            <div class="post-item ">
                                <div class="inner shadow">
                                    <div class="post-item-wrap">
                                        <div class="post-image">
                                            <a href="{{ url('event/' . $event->slug) }}">
                                                <figure>
                                                    <img alt=""
                                                        src="{{ asset('images/events/' . $event->image) }}">
                                                </figure>
                                            </a>
                                            <span class="post-meta-category no-need-remove"><a
                                                    href="">{{ $event->eventCategory->name }}</a></span>
                                        </div>
                                        <div class="post-item-description">
                                            <h2><a href="{{ url('event/' . $event->slug) }}">{{ $event->event_name }}</a>
                                            </h2>
                                            <div class="disc">
                                                {!! \Illuminate\Support\Str::limit(strip_tags($event->event_description), $limit = 170, $end = '...') !!}
                                            </div>
                                            <div class="date_event no-need-remove">
                                                <span class="material-symbols-outlined">
                                                    event
                                                </span>
                                                {{ date('D d M Y', strtotime($event->start_date)) . ' to ' . date('D d M Y', strtotime($event->end_date)) }}
                                            </div>
                                            <div class="buttons">
                                                <div class="no-need-remove">
                                                    @include('pages.event-register-btn', ['event', $event])
                                                </div>
                                                <a href="{{ url('event/' . $event->slug) }}" class="readmore"
                                                    tabindex="0">Read More</a>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post item-->
                        @endforeach
                    </div>
                @else
                    <h3 align="center">No Latest Events Found </h3>
                @endif
            </div>
        </div>
    </section>
    <!--------------------------- home_news --------------------------->
    <section class="no-need-remove">
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
    <!--------------------------- Video --------------------------->
    <section id="image-block" class="testimonials image-block no-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 no-padding">
                    <div class="post-video">
                        <iframe width="100%" height="609px" src="https://www.youtube.com/embed/dA8Smj5tZOQ"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 background-image-overflow"
                    style="background-image: url({{ asset('images/school-bg.jpeg') }})">
                    <h2 class="page-titile h1 text-light">What People Say</h2>
                    <div class="single-slider  text-light">
                        <div class="item">
                            <div class="des">The most happiest time of the day!. Morbi sagittis, sem quis lacinia
                                faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat
                                magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi
                                diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel
                                dolor.</div>
                            <h5>Author</h5>
                            <h6>Beautiful nature</h6>
                        </div>
                        <div class="item">
                            <div class="des">The most happiest time of the day!. Morbi sagittis, sem quis lacinia
                                faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat
                                magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi
                                diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel
                                dolor.</div>
                            <h5>Author</h5>
                            <h6>Beautiful nature</h6>
                        </div>
                        <div class="item">
                            <div class="des">The most happiest time of the day!. Morbi sagittis, sem quis lacinia
                                faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat
                                magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi
                                diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel
                                dolor.</div>
                            <h5>Author</h5>
                            <h6>Beautiful nature</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------------------- home-galley --------------------------->
    <!--------------------------- home-galley --------------------------->
    <section class="home-galley text-center">
        <div class="container-fluid">
            <h2 class="page-title h1 m-b-70">Gallery</h2>
            @if ($photoCategories != '')
                @foreach ($photoCategories as $photoCategory)
                    @if ($photoCategory->activePhotoGalleries->count() > 0)
                        <div class="photo-gallery">
                            <div class="gall-block">
                                <!-- portfolio item -->
                                <div class="grid-layout grid-4-columns" data-item="grid-item" data-margin="30"
                                    data-lightbox="gallery">
                                    @foreach ($photoCategory->activePhotoGalleries as $gallery)
                                        <div class="grid-item ">
                                            <figure><img src="{{ asset('images/gallery/' . $gallery->image) }}"
                                                    alt="{{ $gallery->title }}"></figure>
                                            <div class="gallery-buttons">
                                                <a title="{{ $gallery->title }}" data-lightbox="gallery-image"
                                                    href="{{ asset('images/gallery/' . $gallery->image) }}"><i
                                                        class="icon-maximize"></i></a>
                                                @if ($gallery->image_url != '')
                                                    <a href="{{ $gallery->image_url }}"><i class="icon-link"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- end: portfolio item -->
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>
@endsection
@push('page_scripts')
    <!-- fullcalendar-->
    <script src='{{ asset('frontend/js/fullcalendar/jquery-ui.min.js') }}'></script>
    <script src='{{ asset('frontend/js/fullcalendar/moment.min.js') }}'></script>
    <script src='{{ asset('frontend/js/fullcalendar/fullcalendar.min.js') }}'></script>
    <script>
        $calendar = $('#calendar');
        today = new Date();
        y = today.getFullYear();
        m = today.getMonth();
        d = today.getDate();
        $calendar.fullCalendar({
            viewRender: function(view, element) {
                // We make sure that we activate the perfect scrollbar when the view isn't on Month
                if (view.name != 'month') {
                    $(element).find('.fc-scroller').perfectScrollbar();
                }
            },
            header: {
                left: 'title',
                center: 'month,agendaWeek,agendaDay',
                right: 'prev,next,today'
            },
            defaultDate: today,
            selectable: true,
            selectHelper: true,
            views: {
                month: { // name of view
                    titleFormat: 'MMMM YYYY'
                    // other view-specific options here
                },
                week: {
                    titleFormat: " MMMM D YYYY"
                },
                day: {
                    titleFormat: 'D MMM, YYYY'
                }
            },
            select: function(start, end) {
                // on select we show the Sweet Alert modal with an input
                swal({
                    title: 'Create an Event',
                    html: '<div class="form-group">' +
                        '<input class="form-control" placeholder="Event Title" id="input-field">' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function(result) {
                    var eventData;
                    event_title = $('#input-field').val();
                    if (event_title) {
                        eventData = {
                            title: event_title,
                            start: start,
                            end: end
                        };
                        $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                    }
                    $calendar.fullCalendar('unselect');
                });
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
            events: [{
                    title: 'All Day Event',
                    start: new Date(y, m, 1),
                    className: 'event-default'
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d - 1, 10, 30),
                    allDay: false,
                    className: 'event-green'
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d + 7, 12, 0),
                    end: new Date(y, m, d + 7, 14, 0),
                    allDay: false,
                    className: 'event-red'
                },
                {
                    title: 'Nud-pro Launch',
                    start: new Date(y, m, d - 2, 12, 0),
                    allDay: true,
                    className: 'event-azure'
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false,
                    className: 'event-azure'
                },
                {
                    title: 'Click for Creative Tim',
                    start: new Date(y, m, 21),
                    end: new Date(y, m, 22),
                    url: 'https://www.creative-tim.com',
                    className: 'event-orange'
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 21),
                    end: new Date(y, m, 22),
                    url: 'https://www.creative-tim.com',
                    className: 'event-orange'
                }
            ]
        });
    </script>
@endpush
