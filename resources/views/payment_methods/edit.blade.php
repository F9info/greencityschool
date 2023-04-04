@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Payment Method
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3 animation-form">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($paymentMethod, ['route' => ['paymentMethods.update', $paymentMethod->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('payment_methods.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
                <a href="{{ route('paymentMethods.index') }}" class="btn btn-default rgbtn"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
