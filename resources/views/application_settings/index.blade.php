@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Application Settings</h1>
            </div>
            <div class="col-sm-6">
                @if(auth()->guard('admin')->user()->hasPermissionTo('add-developer-settings-list'))
                <a class="btn btn-primary float-right" href="{{ route('applicationSettings.create') }}">
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
        @include('application_settings.table')
    </div>
</div>
@endsection