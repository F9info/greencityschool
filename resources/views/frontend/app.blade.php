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

<body class="@yield('body_class')">
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
                                                        class=" {{ $submenu->subMenu->count() > 0 ? 'dropdown-submenu' : '' }} {{ Request::is('pages/' . $submenu->slug) ? 'active' : '' }}">
                                                        <a href="{{ pageLink($submenu->type, $submenu->slug, $submenu->custom_url) }}">{{ $submenu->title }}</a>
                                                        @if ($submenu->subMenu->count() > 0)
                                                            <ul class="dropdown-menu">
                                                                @foreach ($submenu->subMenu as $secondlevelsubmenu)
                                                                    <li><a href="{{ pageLink($submenu->type, $submenu->slug, $submenu->custom_url). '#' . $secondlevelsubmenu->slug }}">{{ $secondlevelsubmenu->title }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                <li><a href="{{ url('/contact-us') }}">Contact us</a></li>
                                {{-- <li><a href="{{ url('/donate') }}">Donate</a></li> --}}
                                <li class="li-margin" style="display: none">
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
            <div class="foreground-image"><img src="{{ asset('images/about-bg.svg') }}" alt="Green City Em School" />
            </div>
            <div class="footer-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-3">
                            <!-- Footer widget area 1 -->
                            <div class="widget">
                                <h4>Quick Links</h4>
                                <ul class="list">
                                    @foreach (footerMenu() as $menu)
                                        @if ($menu->type == 'pageview')
                                            <li>
                                                <a href="{{ pageLink($menu->type, $menu->slug, $menu->custom_url) }}">{{ $menu->title }}
                                                </a>
                                            </li>
                                        @endif
                                        @if ($menu->subMenu->count() > 0)
                                            @foreach ($menu->subMenu as $submenu)
                                                <li>
                                                    <a
                                                        href="{{ pageLink($submenu->type, $submenu->slug, $submenu->custom_url) }}">{{ $submenu->title }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- end: Footer widget area 1 -->
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <!-- Footer widget area 2 -->
                            <div class="widget">
                                <h4>Events</h4>
                                <ul class="list full-list">
                                    <li><a href="{{ url('/pages/latest-events') }}">Latest Events</a></li>
                                    <li><a href="{{ url('/pages/past-events') }}">Past Events</a></li>
                                    <li><a href="{{ url('/pages/ongoing-events') }}">Ongoing Events</a></li>                                       
                                </ul>
                            </div>
                            <!-- end: Footer widget area 2 -->
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <!-- Footer widget area 3 -->
                            <div class="widget">
                                <h4>Get In Touch</h4>
                                <ul class="list full-list icon-full-list">



                                    @if (applicationSettings('address') != '')
                                    <li><i class="fa fa-map-marker-alt"></i> {!! applicationSettings('address') !!}
                                    </li>
                                    @endif

                                    @if (applicationSettings('primary-phone-number') != '')
                                    <li><i class="fa fa-phone"></i> <a
                                            href="tel:{{ applicationSettings('primary-phone-number') }}">
                                            {{ applicationSettings('primary-phone-number') }}
                                        </a>
                                    </li>
                                    @endif

                                    @if (applicationSettings('primary-email') != '')
                                    <li><i class="fa fa-envelope"></i> <a
                                            href="mailto:{{ applicationSettings('primary-email') }}">{{ applicationSettings('primary-email') }}
                                        </a></li>
                                        @endif


                                </ul>
                            </div>
                            <!-- end: Footer widget area 3 -->
                        </div>
                   
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <!-- Footer widget area 5 -->
                            <div class="widget clearfix widget-newsletter">
                                <h3>Stay in the loop</h3>
                                <p>Join our mailing list to stay in the loop with our newest for Event and concert
                                </p>
                                <form class="widget-subscribe-form p-r-40" action="include/subscribe-form.php"
                                    role="form" method="post" novalidate="novalidate">
                                    <div class="input-group">
                                        <input aria-required="true" name="widget-subscribe-form-email"
                                            class="form-control required email" placeholder="Enter your Email"
                                            type="email">
                                        <span class="input-group-btn">
                                            <button type="submit" id="widget-subscribe-submit-button"
                                                class="btn"><i class="fa fa-paper-plane"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- end: Footer widget area 5 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container-fluid">
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
    <!-- custom-->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <!-- custom calendar-->
    @stack('page_scripts')
</body>

</html>