@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Create New Member
                    </h1>
                </div>
            </div>
        </div>
    </section>


    <div class="content px-3 admin_alignments backend_memeber_admin">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'personalDetails.store', 'id' => 'checkout-form']) !!}

            <div class="card-body">

                <div class="row animation-form">
                    @include('personal_details.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
                <a href="{{ route('personalDetails.index') }}" class="btn btn-default rgbtn"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    @include('membership_form_common.datepicker')
@endsection
