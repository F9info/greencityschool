@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Create New Committee Categories
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card admin_alignments">

            {!! Form::open(['route' => 'committeeCategories.store']) !!}

            <div class="card-body">

                <div class="row animation-form">
                    @include('committee_categories.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
                <a href="{{ route('committeeCategories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
