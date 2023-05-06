@extends('frontend.app')
@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
        <figure>
            @if ($page->banner_image != '')
                <img src="{{ asset('images/inner-pages/' . $page->banner_image) }}" alt="{{ $page->title }}">
            @else
                <img src="{{ asset('images/site-images/' . applicationSettings('inner-banner')) }}" alt="{{ $page->title }}">
            @endif
        </figure>
    </div>
    <div class="container text-center">
        <div class="inner-page-title">
            <h1>{{ $page->banner_title != '' ? $page->banner_title : $page->title }}</h1>
        </div>
    </div>
    <!-- end: Page title -->
    @if ($page->slug == 'vpl-education-society' || $page->slug == 'photos' || $page->slug == 'videos')
        {!! $page->content !!}
        @elseif ($page->slug == 'amenities')
        <section class="facilities-section p-0" >
            <div class="container">
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
            </div>
        </section>

    @else
        <section class="inner-page-content">
            <div class="container">
                @if($page->parent != 'root' && $page->subMenu()->count() > 0)
                    @foreach ($page->subMenu as $subMenu)
                        <div id="{{ $subMenu->slug }}">
                            <h1>{{ $subMenu->title }}</h1>
                            {!! $subMenu->content !!}
                        </div>
                    @endforeach
                @else
                    {!! $page->content !!}
                @endif
            </div>
        </section>
    @endif
   
    @if ($page->slug == 'vpl-education-society')
        <section class="about-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 pic">
                        <figure class="pic-radius">
                            <img src="http://127.0.0.1:8000/images/media/lahxjhqth.jpg" alt="GREEN CITY SCHOO" />
                        </figure>
                    </div>
                    <div class="col-md-7 description">
                        <h2>WHY GREEN CITY SCHOOL ?</h2>
                        <p>We intend to provide children with flexibility in learning. Allowing self-development by
                            nurturing
                            creativity. Following up on children’s interests and enhance their learning. Provide Enough
                            opportunities to develop skills and confidence. Allowing the children to use their own
                            initiative.
                        </p>
                        <ol class="inner-list">
                            <li> A Top class education on par with the best anywhere.</li>
                            <li> A great ambience to work hard and to develop all personality traits.</li>
                            <li> A position in society that will grant you pride and respect.</li>
                        </ol>
                        <h5 class="color-primary font-weight-700">Campus features :</h5>
                        <p>Fully equipped labs, Library with huge number of books, Swimming pool, Basket ball, table tennis,
                            shuttle courts, Football ground, Well organized Transportation facility, CBSE Syllabus/NCERT
                            Books
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="background-primary text-light text-center">
            <div class="container">
                <h2 class="font-weight-700 h1">Affiliated to Central Board of Secondary Education,
                    New Delhi vide affiliation number 130384 up to Secondary Level.</h2>
            </div>
        </section>
        <section class="mission-vision">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 missin-left">
                        <div class="inner">
                            <div class="text">
                                <h2 class="h1">Mission</h2>
                                <p>We, the Members and Team of the DPSE-Society acquire a Charter Excellence in Education,
                                    Social Service and Advanced Development of Human Values with a commitment</p>
                                <p>We, the Members and Team of the DPSE-Society acquire a Excellence in Education, Social
                                    Service and Advanced Development of Human Values with a commitment Advanced Development
                                    of
                                    Human Values with a commitment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 missin-right">
                        <div class="inner">
                            <div class="text">
                                <h2 class="h1">Vision</h2>
                                <p>We, the Members and Team of the DPSE-Society acquire a Charter Excellence in Education,
                                    Social Service and Advanced Development of Human Values with a commitment We, the
                                    Members
                                    and Team of the DPSE-Society acquire a Excellence in Education, Social Service and
                                    Advanced
                                    Development of Human Values with a commitment Advanced Development of Human Values with
                                    a
                                    commitment DPSE-Society acquire a Excellence in Education, Social Service and Advanced
                                    Development of Human Values with a commitment </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-goal background-image text-light"
            style="background-image:url('http://127.0.0.1:8000/images/media/lahxjhqth.jpg');">
            <div class="container">
                <h2 class="text-center h1">Our Goal</h2>
                <h3 class="text-center m-b-70">We, the Members and Team of the DPSE-Society acquire a Charter of Excellence
                    in
                    Education, Social
                    Service and Advanced Development of Human Values with a commitment:</h3>
                <ul class="inner-list list-large list-two-columns">
                    <li>D.P.S Educational Society</li>
                    <li>Encourage every child to work to the best of his/her ability</li>
                    <li>Aims to offer world class educational training and learning activities.</li>
                    <li>To promote quality education through technological advancement.</li>
                    <li>Standardize education system with stress free and wholesome environment.</li>
                    <li>Best in Class Curriculum.</li>
                    <li>The D.P.S Educational Society</li>
                    <li>Encourage every child to work to the best of his/her ability.</li>
                    <li>Best in Class Curriculum.</li>
                    <li>The D.P.S Educational Society
                    <li>Encourage every child to work to the best of his/her ability.</li>
                    <li>Best in Class Curriculum.</li>
                    <li>The D.P.S Educational Society</li>
                </ul>
            </div>
        </section>
        <section class="national-society">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 description mob-order-2">
                        <h2 class="inner-title">The National Education Society</h2>
                        <p>The enlightening world of streamlined education, where excellence has been redefined by the
                            comprehensive efforts of the competent professionals and visionary management. We promise you a
                            rewarding and mutually enriching experience that will lead you to the unchallenged and
                            unexplored
                            zenith of success.</p>
                        <p>The National Education Society, Sarigam welcome you to the enlightening world of streamlined
                            education, where excellence has been redefined by the comprehensive efforts of the competent
                            professionals and visionary management. We promise you a rewarding and mutually enriching
                            experience
                            that will lead you to the unchallenged and unexplored zenith of success.</p>
                        <p>The goal fo the school is to provide quality education and circulate the best standards of
                            learning
                            among children, with excellence. Focus is given on individual potential and each student is
                            believed
                            to be unique. The method of teaching is child-oriented and the atmosphere is warm and friendly.
                            Inculcating values through practice helps to mould the children into responsible citizens of
                            tomorrow.</p>
                    </div>
                    <div class="col-md-6 pic mob-order-1">
                        <figure class="pic-radius">
                            <img src="http://127.0.0.1:8000/images/media/lahxjhqth.jpg" alt="GREEN CITY SCHOOl" />
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <section class="trustees background-primary text-center">
            <div class="container">
                <h2 class="h1 text-light m-b-50">Trustees of the society</h2>
                <div class="row team-members team-members-shadow m-b-40">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <div class="team-image p-20 p-b-0">
                                <img src="http://127.0.0.1:8000/images/media/lahxjhqth.jpg" alt="GREEN CITY SCHOOl" />
                            </div>
                            <div class="team-desc">
                                <h3>K. Vara Prasad</h3>
                                <p class="color-primary font-weight-700">President</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <div class="team-image p-20 p-b-0">
                                <img src="http://127.0.0.1:8000/images/media/lahxjhqth.jpg" alt="GREEN CITY SCHOOl" />
                            </div>
                            <div class="team-desc">
                                <h3>K. Vara Prasad</h3>
                                <p class="color-primary font-weight-700">President</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <div class="team-image p-20 p-b-0">
                                <img src="http://127.0.0.1:8000/images/media/lahxjhqth.jpg" alt="GREEN CITY SCHOOl" />
                            </div>
                            <div class="team-desc">
                                <h3>K. Vara Prasad</h3>
                                <p class="color-primary font-weight-700">President</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-light btn-lg">View More Trustees</a>
            </div>
        </section>
        <section class="why-choose-us no-padding">
            <div class="inner  background-image text-light text-center"
                style="background-image:url('http://127.0.0.1:8000/images/media/lahxjhqth.jpg');">
                <div class="container">
                    <h1>Why Choose Us</h1>
                </div>
            </div>
            <div class="counter-section">
                <div class="container">
                    <!--Icon box counters -->
                    <div class="row">
                        <div class="col-lg-3 counter-item">
                            <div class="icon-box effect shadow medium border center">
                                <div class="icon bold"> <span class="material-symbols-outlined">
                                        workspace_premium
                                    </span> </div>
                                <div class="counter bold"> <span data-speed="3500" data-refresh-interval="50"
                                        data-to="9033" data-from="0" data-seperator="true"></span> </div>
                                <p>Certified Teachers</p>
                            </div>
                        </div>
                        <div class="col-lg-3 counter-item">
                            <div class="icon-box effect shadow medium border center">
                                <div class="icon"> <span class="material-symbols-outlined">
                                        group
                                    </span> </div>
                                <div class="counter"> <span data-speed="1500" data-refresh-interval="50"
                                        data-to="258658" data-from="0" data-seperator="true"></span> </div>
                                <p>Students Enrolled</p>
                            </div>
                        </div>
                        <div class="col-lg-3 counter-item">
                            <div class="icon-box effect shadow medium border center">
                                <div class="icon"> <span class="material-symbols-outlined">
                                        fact_check
                                    </span> </div>
                                <div class="counter bold"> <span data-speed="3500" data-refresh-interval="50"
                                        data-to="99" data-suffix="%" data-from="0" data-seperator="true"></span>
                                </div>
                                <p>Board Results of Students</p>
                            </div>
                        </div>
                        <div class="col-lg-3 counter-item">
                            <div class="icon-box effect shadow medium border center">
                                <div class="icon"><span class="material-symbols-outlined">
                                        verified
                                    </span>
                                </div>
                                <div class="counter"> <span data-speed="1500" data-refresh-interval="50" data-to="100"
                                        data-suffix="%" data-from="0" data-seperator="true"></span> </div>
                                <p>Satisfied Franchise.</p>
                            </div>
                        </div>
                    </div>
                    <!--End: Large counters-->
                </div>
            </div>
        </section>
    @endif
    <section class="inner_pages">
        <div class="container">
            @if ($page->slug == 'trustees' && $founders != null)
                <div class="row excutive_gallery ">
                    @if ($founders != '' && $founders->count() > 0)
                        @foreach ($founders as $founder)
                            <div class="col-lg-4">
                                <div class="card">
                                    <figure class="fig_pic"><img class="card-img-top"
                                            src="{{ asset('images/committee-members/' . $founder->member_photo) }}"
                                            alt=""></figure>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $founder->name }}</h5>
                                        <p class="card-catigory">{{ $founder->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
            @if ($page->slug == 'executive-committee' && $executiveCommittees != null)
                <div class="row excutive_gallery ">
                    @if ($executiveCommittees != '' && $executiveCommittees->count() > 0)
                        @foreach ($executiveCommittees as $executiveCommitte)
                            <div class="col-lg-4">
                                <div class="card">
                                    <figure class="fig_pic"><img class="card-img-top"
                                            src="{{ asset('images/committee-members/' . $executiveCommitte->member_photo) }}"
                                            alt=""></figure>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $executiveCommitte->name }}</h5>
                                        <p class="card-catigory">{{ $executiveCommitte->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
            @if ($page->slug == 'board-members' && $boardMembers != null)
                <div class="row excutive_gallery ">
                    @if ($boardMembers != '' && $boardMembers->count() > 0)
                        @foreach ($boardMembers as $boardMember)
                            <div class="col-lg-4">
                                <div class="card">
                                    <figure class="fig_pic"><img class="card-img-top"
                                            src="{{ asset('images/committee-members/' . $boardMember->member_photo) }}"
                                            alt=""></figure>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $boardMember->name }}</h5>
                                        <p class="card-catigory">
                                            {{ $boardMember->designation }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
            @if ($page->slug == 'caf-organization-structure' && $cafogsts != null)
                <div class="row excutive_gallery ">
                    @if ($cafogsts != '' && $cafogsts->count() > 0)
                        @foreach ($cafogsts as $cafogst)
                            <div class="col-lg-4">
                                <div class="card">
                                    <figure class="fig_pic"><img class="card-img-top"
                                            src="{{ asset('images/committee-members/' . $cafogst->member_photo) }}"
                                            alt=""></figure>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cafogst->name }}</h5>
                                        <p class="card-catigory">
                                            {{ $cafogst->caf_designation }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
            @if ($page->slug == 'photos' && $photoCategories != null)
                <div class="photo-gallery">
                    @foreach ($photoCategories as $photoCategory)
                        @if ($photoCategory->activePhotoGalleries->count() > 0)
                            <div class="col-lg-12 gall-block">
                                <h3 class="gallery_title">{{ $photoCategory->year }}
                                    {{-- -<span>{{ $photoCategory->name }}</span> --}}
                                </h3>
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
                        @endif
                    @endforeach
                </div>
            @endif
            @if ($page->slug == 'videos' && $videoCategories != null)
                <div class="video-gallery">
                    @foreach ($videoCategories as $videoCategory)
                        @if ($videoCategory->activeVideoGalleries->count() > 0)
                            <div class="col-lg-12 gall-block">
                                <div data-lightbox="gallery" class="row">
                                    @foreach ($videoCategory->activeVideoGalleries as $videoGallery)
                                        @if (!empty($videoGallery->video_url))
                                            <div class="col-lg-4">
                                                <?php
                                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoGallery->video_url, $match);
                                                if ($match) {
                                                    $youtubeid = $match[1];
                                                }
                                                ?>
                                                @isset($youtubeid)
                                                    <div class="grid-item">
                                                        <div class="grid-item-wrap">
                                                            <div class="grid-image"> <img alt="Image Lightbox"
                                                                    src="http://i1.ytimg.com/vi/{{ $youtubeid }}/mqdefault.jpg" />
                                                            </div>
                                                            <div class="grid-description">
                                                                <a href="https://www.youtube.com/watch?v={{ $youtubeid }}"
                                                                    data-lightbox="iframe"><i class="icon-play"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endisset
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            @if ($page->slug == 'news-coverage' && $newsCoverageCategories != null)
                <div class="coverage-links">
                    @foreach ($newsCoverageCategories as $newsCoverageCategory)
                        @if ($newsCoverageCategory->activeNewsCoverages->count() > 0)
                            <div class="item">
                                <h3>{{ $newsCoverageCategory->name }} - <span>{{ $newsCoverageCategory->year }}</span>
                                </h3>
                                <ul class="cvr_list">
                                    @foreach ($newsCoverageCategory->activeNewsCoverages as $newsCoverage)
                                        <li><a href="{{ $newsCoverage->news_url }}"
                                                target="_blank">{{ $newsCoverage->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            @if ($page->slug == 'latest-events')
                @if ($upcomingEvents->count() > 0)
                    <div class="row">
                        @foreach ($upcomingEvents as $upcomingEvent)
                            @include('pages.events-list-display', ['event' => $upcomingEvent])
                        @endforeach
                    </div>
                @else
                    <h4 class="no_message">No Latest Events Found</h4>
                @endif
            @endif
            @if ($page->slug == 'past-events')
                @if ($pastEvents->count() > 0)
                    <div class="row events_no_button">
                        @foreach ($pastEvents as $pastEvent)
                            @include('pages.events-list-display', ['event' => $pastEvent])
                        @endforeach
                    </div>
                @else
                    <h4 class="no_message">No Past Events Found</h4>
                @endif
            @endif
            @if ($page->slug == 'ongoing-events')
                @if ($ongoingEvents->count() > 0)
                    <div class="row events_no_button">
                        @foreach ($ongoingEvents as $ongoingEvent)
                            @include('pages.events-list-display', ['event' => $ongoingEvent])
                        @endforeach
                    </div>
                @else
                    <h4 class="no_message">No Ongoing Events Found</h4>
                @endif
            @endif
        </div>
    </section>
@endsection
