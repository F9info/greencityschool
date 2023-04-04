@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Committee Category Types <span>Removed</span></h1>
            </div>
            <div class="col-sm-6">
                @if(auth()->guard('admin')->user()->hasPermissionTo('add-committee-category-types'))
                <a class="btn btn-primary float-right ajax-popup-link"
                    href="{{ route('committeeCategoryTypes.create') }}">
                    <span class="material-symbols-outlined">
                        add
                    </span> Add New
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        @include('committee_category_types.table')
    </div>
</div>

@endsection
