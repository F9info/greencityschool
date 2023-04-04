@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Event Registrations</h1>
                </div>
                {{-- <div class="col-sm-6">

                    <a class="btn btn-primary float-right" href="{{ route('eventRegistrations.create') }}">
                        <span class="material-symbols-outlined">add</span> Add New
                    </a>

                </div> --}}
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('event_registrations.table')
        </div>
    </div>
@endsection
