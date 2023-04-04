@extends('layouts.app')

@section('content')






<div class="sub_tabs">
    <ul class="dashboard-top_list float-left">

        <li class="{{ Request::is('sponsors*') ? 'active' : '' }}"><a href="{{ route('sponsors.index') }}"><span class="material-symbols-outlined">
            handshake
            </span>Sponsors & Partners</a></li>

            <li class="{{ Request::is('sponsorCategories*') ? 'active' : '' }}"><a href="{{ route('sponsorCategories.index') }}"><span class="material-symbols-outlined">
                handshake
                </span>Categories</a></li>




        </ul>
        @if(auth()->guard('admin')->user()->hasPermissionTo('add-sponsors'))
        <a class="btn btn-primary float-right "
        href="{{ route('sponsors.create') }}">
        <span class="material-symbols-outlined">
         add
     </span>Add New
     </a>
     @endif

     <a class="btn btn-secondary float-right ajax-popup-link"
     href="{{ route('sponsorCategories.create') }}">
     <span class="material-symbols-outlined">
      add
  </span>Add New Category
  </a>

    <div class="clear"></div>
    </div>








    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">





            @include('sponsors.table')
        </div>
    </div>

@endsection
