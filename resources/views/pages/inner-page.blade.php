@extends('frontend.app')
@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
        <div class="inner-page-title">
            <h1>{{ $page->banner_title != '' ? $page->banner_title : $page->title }}</h1>
        </div>
        <figure>
            @if ($page->banner_image != '')
                <img src="{{ asset('images/inner-pages/' . $page->banner_image) }}" alt="{{ $page->title }}">
            @else
                <img src="{{ asset('images/site-images/' . applicationSettings('inner-banner')) }}" alt="{{ $page->title }}">
            @endif
        </figure>
    </div>
    <!-- end: Page title -->
    <section class="inner_pages">
        <div class="container">
            {!! $page->content !!}
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
                                <div class="row">
                                    @foreach ($photoCategory->activePhotoGalleries as $gallery)
                                        <div class="col-lg-3 overalsection">
                                            <div class="card">
                                                <figure> <img class="card-img-top"
                                                        src="{{ asset('images/gallery/' . $gallery->image) }}"
                                                        alt=""></figure>
                                                <div class="card-body-01">
                                                    <h5 class="card-title">{{ $gallery->title }}</h5>
                                                    <a href="{{ $gallery->image_url }}" class="btn btn-primary btn-xs"
                                                        target="_blank">View Photos</a>
                                                </div>
                                            </div>
                                            <a class="full_link" href="{{ $gallery->image_url }}"
                                                target="_blank">&nbsp;</a>
                                        </div>
                                    @endforeach
                                </div>
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
                                <h3 class="gallery_title">{{ $videoCategory->name }}</h3>
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
    <!--------------------------- sponser-block --------------------------->
    @include('pages.sponsors')
    <!--------------------------- subscribe_block --------------------------->
    @include('pages.subscribe')
    <!--------------------------- media-partners-block --------------------------->
    @include('pages.media-partners')
@endsection
