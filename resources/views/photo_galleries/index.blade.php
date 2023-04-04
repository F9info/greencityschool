@extends('layouts.app')

@section('content')
    <div class="admin_sub_tabs">
        <ul>
            <li class="active"><a href="{{ route('photoGalleries.index') }}">Photo Gallery</a></li>
            <li><a href="{{ route('photoGalleryCategories.index') }}">Photo Categories</a></li>
            <li><a href="{{ route('videoGalleries.index') }}">Video Gallery</a></li>
            <li><a href="{{ route('videoGalleryCategories.index') }}">Video Categories </a></li>
        </ul>
    </div>





    {{-- <div class="sub_tabs">
        <ul class="dashboard-top_list float-left">

            <li class="{{ Request::is('photoGalleries*') ? 'active' : '' }}"><a
                    href="{{ route('photoGalleries.index') }}"><span class="material-symbols-outlined">
                        gallery_thumbnail
                    </span>Photo Gallery</a></li>



            <li class="{{ Request::is('videoGalleries*') ? 'active' : '' }}"><a
                    href="{{ route('videoGalleries.index') }}"><span class="material-symbols-outlined">
                        slideshow
                    </span> Video Gallery</a></li>




        </ul>






        <div class="clear"></div>
    </div>
 --}}






    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">

            <div class="postions_buttons">



                @if(auth()->guard('admin')->user()->hasPermissionTo('add-photo-gallery'))
                <a class="btn btn-primary " href="{{ route('photoGalleries.create') }}">
                    <span class="material-symbols-outlined">
                        add
                    </span>Add New
                </a>
                @endif




            </div>

            @include('photo_galleries.table')
        </div>
    </div>
@endsection
