@extends('layouts.app')

@section('content')
    <div class="admin_sub_tabs">
        <ul>
            <li><a href="{{ route('photoGalleries.index') }}">Photo Gallery</a></li>
            <li><a href="{{ route('photoGalleryCategories.index') }}">Photo Categories</a></li>
            <li class="active"><a href="{{ route('videoGalleries.index') }}">Video Gallery</a></li>
            <li><a href="{{ route('videoGalleryCategories.index') }}">Video Categories </a></li>
        </ul>
    </div>








    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">

            <div class="postions_buttons">
                @if(auth()->guard('admin')->user()->hasPermissionTo('add-video-gallery'))
                <a class="btn btn-primary " href="{{ route('videoGalleries.create') }}">
                    <span class="material-symbols-outlined">
                        add
                    </span>Add New
                </a>
                @endif




            </div>
            @include('video_galleries.table')
        </div>
    </div>
@endsection
