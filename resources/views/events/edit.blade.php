@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Event
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'patch', 'autocomplete' => 'off', 'files' => 'true']) !!}

            <div class="card-body">
                <div class="row animation-form">
                    @include('events.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary  rgbtn']) !!}
                <a href="{{ route('events.index', ['type' => 'upcoming']) }}" class="btn btn-default  rgbtn"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
