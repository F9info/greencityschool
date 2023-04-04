@extends('frontend.app')

@section('content')
    <section class="news_secion_details">
        <div class="container">
            <div class="col-lg-12">
                @if ($news != null)
                    <div class="card">
                        <div class="card-body">
                            <figure><img alt="" src="{{ asset('images/news/' . $news->image) }}" class="img-fluid">
                            </figure>
                            <div class="description">
                                <h2>{{ $news->title }}</h2>
                                <span class="post-meta-date"><i class="fa fa-calendar-alt"></i> &nbsp; &nbsp;
                                    {{ formatDate($news->created_at) }}</span>
                                <div style="color: #333; margin-top:10px">{!! $news->description !!}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <h3 align="center">No News Details Found</h3>
                @endif
            </div>
        </div>
        <div class="login_pic">
            <img alt="{!! applicationSettings('site-name') !!}" class="positon-right-pic" src="{{ asset('images/login_pic.svg') }}">
        </div>
    </section>
@endsection
