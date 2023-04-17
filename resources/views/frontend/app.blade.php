<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="{!! applicationSettings('site-name') !!}" />
    <meta name="description" content="{!! applicationSettings('site-name') !!}">
    <!-- Document title -->
    <title>{!! applicationSettings('site-name') !!}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/site-images/' . applicationSettings('favicon')) }}">
    <!-- Stylesheets & Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
        integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('frontend/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('../css/form_common.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    @yield('page_styles')
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light header-sticky">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="{{ url('/') }}">
                            <img class="logo-dark logo-default" alt="{!! applicationSettings('logo-caption') !!}"
                                src="{{ asset('images/site-images/' . applicationSettings('logo')) }}" />
                            <span class="logo-dark">{!! applicationSettings('logo-caption') !!}</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <nav>
                            <ul>
                                {{-- <li><a href="{{ url('/') }}">Home</a></li> --}}
                                @foreach (mainMenu() as $menu)
                                    <li
                                        class="{{ $menu->subMenu->count() > 0 ? 'dropdown' : '' }} {{ Request::is('pages/' . $menu->slug) ? 'active' : '' }}">
                                        <a href="{{ pageLink($menu->type, $menu->slug, $menu->custom_url) }}">{{ $menu->title }}
                                            @if ($menu->subMenu->count() > 0)
                                                <i class="fa  fa-chevron-down"></i>
                                            @endif
                                        </a>
                                        @if ($menu->subMenu->count() > 0)
                                            <ul class="dropdown-menu">
                                                @foreach ($menu->subMenu as $submenu)
                                                    <li
                                                        class="dropdown-submenu {{ $menu->subMenu->count() > 0 ? 'submenu' : '' }} {{ Request::is('pages/' . $submenu->slug) ? 'active' : '' }}">
                                                        <a
                                                            href="{{ pageLink($submenu->type, $submenu->slug, $submenu->custom_url) }}">{{ $submenu->title }}</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">dropdown-submenu</a></li>
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                <li><a href="{{ url('/contact-us') }}">Contact us</a></li>
                                {{-- <li><a href="{{ url('/donate') }}">Donate</a></li> --}}
                                <li class="li-margin">
                                    <a class="btn btn-primary"
                                        href="{{ Auth::check() ? route('logout') : route('login') }}"
                                        onclick="{{ Auth::check() ? "event.preventDefault(); document.getElementById('logout-form').submit();" : '' }}">
                                        <span class="material-symbols-outlined">
                                            person_add
                                        </span>
                                        {{ Auth::check() ? 'Logout' : 'Student Login' }}
                                    </a>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">@csrf</form>
                                </li>
                                {{-- <li><a class="btn-login"
href="{{ Auth::check() ? route('home') : route('register') }}">
<span class="material-symbols-outlined">
person_add
</span>
{{ Auth::check() ? 'Welcome ' . Auth::user()->first_name : 'Register' }}</a>
</li> --}}
                            </ul>
                        </nav>
                    </div>
                    <!--end: Navigation-->
                    <div class="clear"></div>
                </div>
            </div>
        </header>
        <!-- end: Header -->
        <!-- Content -->
        @yield('content')
        <!-- end: Content -->
        <!-- Footer -->
        <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 footer-left">
                            <div class="widget">
                                <a href="{{ url('/') }}" class="footer_logo">
                                    <img alt="logo"
                                        src="{{ asset('images/site-images/' . applicationSettings('logo')) }}" />
                                </a>
                                <div class="footer-text">
                                    {!! applicationSettings('footer-text') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 footer-right">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="widget">
                                        <div class="widget-title">Sitemap</div>
                                        <ul class="list">
                                            <li><a href="{{ url('/') }}"><i
                                                        class="fa fa-arrow-alt-circle-right"></i> Home</a></li>
                                            @foreach (footerMenu() as $menu)
                                                @if ($menu->type == 'pageview')
                                                    <li
                                                        class="{{ $menu->subMenu->count() > 0 ? 'submenu' : '' }} {{ Request::is('pages/' . $menu->slug) ? 'active' : '' }}">
                                                        <a
                                                            href="{{ $menu->custom_url != '' ? $menu->custom_url : url('/pages/' . $menu->slug) }}"><i
                                                                class="fa fa-arrow-alt-circle-right"></i>
                                                            {{ $menu->title }}
                                                        </a>
                                                        @foreach ($menu->subMenu as $submenu)
                                                    <li
                                                        class="{{ $menu->subMenu->count() > 0 ? 'submenu' : '' }} {{ Request::is('pages/' . $submenu->slug) ? 'active' : '' }}">
                                                        <a
                                                            href="{{ pageLink($submenu->type, $submenu->slug, $submenu->custom_url) }}"><i
                                                                class="fa fa-arrow-alt-circle-right"></i>{{ $submenu->title }}</a>
                                                    </li>
                                                @endforeach
                                                </li>
                                            @endif
                                            @endforeach
                                            <li><a href="{{ url('/contact-us') }}"><i
                                                        class="fa fa-arrow-alt-circle-right"></i>Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <div class="widget-title">Contact Us</div>
                                        <ul class="address_lost">
                                            <li><i class="fa fa-map-marker-alt"></i> {!! applicationSettings('address') !!}
                                            </li>
                                            <li><i class="fa fa-phone"></i> <a
                                                    href="tel:{{ applicationSettings('primary-phone-number') }}">
                                                    {{ applicationSettings('primary-phone-number') }}
                                                </a>
                                            </li>
                                            <li><i class="fa fa-envelope"></i> <a
                                                    href="mailto:{{ applicationSettings('primary-email') }}">{{ applicationSettings('primary-email') }}
                                                </a></li>
                                        </ul>
                                        <div class="social">
                                            @if (applicationSettings('facebook') != '')
                                                <a class="facebook" target="_blank"
                                                    href="{{ applicationSettings('facebook') }}"><i
                                                        class="fab fa-facebook-f"></i></a>
                                                @endif @if (applicationSettings('twitter') != '')
                                                    <a class="twitter" target="_blank"
                                                        href="{{ applicationSettings('twitter') }}"><i
                                                            class="fab fa-twitter"></i></a>
                                                @endif
                                                @if (applicationSettings('instagram') != '')
                                                    <a class="linkedin" target="_blank"
                                                        href="{{ applicationSettings('instagram') }}"><i
                                                            class="fab fa-instagram"></i></a>
                                                @endif
                                                @if (applicationSettings('google-plus') != '')
                                                    <a class="google-plus"
                                                        href="{{ applicationSettings('google-plus') }}"
                                                        target="_blank"><i class="fab fa-google-plus-g"></i></a>
                                                    @endif @if (applicationSettings('youtube') != '')
                                                        <a class="youtube"
                                                            href="{{ applicationSettings('youtube') }}"
                                                            target="_blank"><i class="fab fa-youtube"></i></a>
                                                    @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <p class="fleft">{{ applicationSettings('copyright') }}</p>
                    <p class="fright">Designed by <a href="https://f9tech.com/" target="_blank">F9 Tech</a></p>
                    <div class="clear"></div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <!--parsley-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <!--validtations-->
    <script src="{{ asset('js/jquery-key-restrictions.min.js') }}"></script>
    <!--form-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script src="{{ asset('../js/form_common.js') }}"></script>
    <script src="{{ asset('../js/datepicker.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <!--slick-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom_slick.js') }}"></script>
    <!-- functions-->
    <script src="{{ asset('frontend/js/functions.js') }}"></script>
    <!-- fullcalendar-->
    <script src='{{ asset('frontend/js/fullcalendar/jquery-ui.min.js') }}'></script>
    <script src='{{ asset('frontend/js/fullcalendar/moment.min.js') }}'></script>
    <script src='{{ asset('frontend/js/fullcalendar/fullcalendar.min.js') }}'></script>
    <!-- custom-->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <!-- custom calendar-->
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
    @stack('page_scripts')
</body>

</html>
