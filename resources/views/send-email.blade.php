@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Send Email
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            @include('flash::message')

            {!! Form::open(['url' => 'send-email-users']) !!}

            <div class="card-body">

                <div class="row animation-form">
                    <!-- From Email Field -->
                    <div class="form-group col-sm-4 disbaled_input">

                        {!! Form::text('id', null, [
                            'class' => 'form-control',
                            'readonly' => 'true',
                            'placeholder' => 'projects@f9tech.com',
                        ]) !!}

                    </div>

                    <!-- To Email Field -->
                    <div class="form-group col-sm-4">

                        {!! Form::text('to_email', null, ['class' => 'form-control', 'required']) !!}
                        {!! Form::label('to_email', 'To Email:') !!}
                        <span>[ If multiple e-mails, separate by comma (,) ]</span>
                    </div>

                    <!-- Email Subject Field -->
                    <div class="form-group col-sm-4">

                        {!! Form::text('email_subject', null, ['class' => 'form-control', 'required']) !!}
                        {!! Form::label('email_subject', 'Subject:') !!}
                    </div>

                    <!-- Email Body Field -->
                    <div class="form-group col-sm-12 col-lg-12 textarea-section">

                        {!! Form::textarea('email_body', null, ['class' => 'form-control', 'required']) !!}
                        {!! Form::label('email_body', 'Email Body:') !!}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        var editor1 = CKEDITOR.replace('email_body');
        editor1.config.allowedContent = true;
    </script>
@endpush