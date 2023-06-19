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
                <div class="row  about-items">
                    <div class="col-md-4 home-card-item">
                        <div class="green-card h-100">
                            <div class="green-inner h-100 ">
                                <figure><img src="{{ asset('images/site-images/' . applicationSettings('welcome-block-one-image')) }}" alt=""></figure>
                                <h4>{!! applicationSettings('welcome-block-one-title') !!}</h4>
                                {!! applicationSettings('welcome-block-one-description') !!}
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 home-card-item ">
                        <div class="green-card h-100">
                            <div class="green-inner">
                                <figure><img src="{{ asset('images/site-images/' . applicationSettings('welcome-block-two-image')) }}" alt=""></figure>
                                <h4>{!! applicationSettings('welcome-block-two-title') !!}</h4>
                                {!! applicationSettings('welcome-block-two-description') !!}
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 home-card-item">
                        <div class="green-card h-100">
                            <div class="green-inner ">
                                <figure><img src="{{ asset('images/site-images/' . applicationSettings('welcome-block-three-image')) }}" alt=""></figure>
                                <h4>{!! applicationSettings('welcome-block-three-title') !!}</h4>
                                {!! applicationSettings('welcome-block-three-description') !!}
                              
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
                        {{-- <div class="col-md-4">
                            <div class="calender-list">
                                <h3>Events</h3>
                                <ul>
                                    <li>No Events</li>
                                   
                                </ul>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
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
                        <iframe width="100%" height="609px" src="{{ applicationSettings('home-page-video-url') }}"
                            frameborder="0" allowfullscreen></iframe>



                            
                    </div>
                </div>
                <div class="col-lg-6 background-image-overflow"
                    style="background-image: url({{ asset('images/school-bg.jpeg') }})">
                    <h2 class="page-titile h1 text-light">What People Say</h2>
                    <div class="single-slider  text-light">
                        <div class="item">
                            <div class="des">I am incredibly impressed with the quality of education my child receives at your school. The teachers are dedicated, supportive, and create a stimulating learning environment that has greatly contributed to my child's academic and personal growth.</div>
                            <h5>Srinivas Rao</h5>
                            
                        </div>
                        <div class="item">
                            <div class="des">Attending your school was a transformative experience for me. The challenging curriculum, coupled with the nurturing atmosphere, helped me develop essential skills, build lifelong friendships, and set a solid foundation for my future success.</div>
                            <h5>Lakshmi Devi</h5>
                            
                        </div>
                        <div class="item">
                            <div class="des">Choosing your school for my child was the best decision I made. The innovative teaching methods, emphasis on holistic development, and inclusive community have created a positive and enriching educational journey for my child.</div>
                            <h5>Prasad Kumar</h5>
                            
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
                                            
                                            
                                                    @if ($gallery->image_url != '')

                                            <div class="gallery-buttons">
                                                <a title="{{ $gallery->title }}" data-lightbox="gallery-image"
                                                    href="{{ asset('images/gallery/' . $gallery->image) }}"><i
                                                        class="icon-maximize"></i></a>
                                               
                                                    <a href="{{ $gallery->image_url }}"><i class="icon-link"></i></a>
                                              
                                            </div>

                                            @else
                                            <a class="full-link" title="{{ $gallery->title }}" data-lightbox="gallery-image"
                                                href="{{ asset('images/gallery/' . $gallery->image) }}"><i class="fa fa-search" aria-hidden="true"></i></a>

                                            @endif





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
12a    <script>
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
         
        });
    </script>
@endpush
