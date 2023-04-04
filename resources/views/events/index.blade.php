@extends('layouts.app')

@section('content')
    <div class="sub_tabs">
        <ul class="dashboard-top_list float-left">
            <li class="{{ request()->get('type') == 'upcoming' ? 'active' : '' }}">
                <a href="{{ route('events.index', ['type' => 'upcoming']) }}">
                    <span class="material-symbols-outlined">
                        calendar_month
                    </span>
                    Latest Events
                </a>
            </li>
            <li class="{{ request()->get('type') == 'current' ? 'active' : '' }}">
                <a href="{{ route('events.index', ['type' => 'current']) }}">
                    <span class="material-symbols-outlined">
                        calendar_month
                    </span>
                    Ongoing events
                </a>
            </li>
            <li class="{{ request()->get('type') == 'past' ? 'active' : '' }}">
                <a href="{{ route('events.index', ['type' => 'past']) }}">
                    <span class="material-symbols-outlined">
                        calendar_month
                    </span>
                    Past Events
                </a>
            </li>
        </ul>

        @if(auth()->guard('admin')->user()->hasPermissionTo('add-events'))
        <a class="btn btn-primary float-right" href="{{ route('events.create') }}">
            <span class="material-symbols-outlined">
                add
            </span>
            Add New
        </a>
        @endif

        <div class="clear"></div>
    </div>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('events.table')
        </div>
    </div>
@endsection
