@extends('layouts.app')

@push('page_scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        @if ($heading == 'application-settings')
                            Application Settings
                        @elseif($heading == 'developer-settings')
                            Developer Settings
                        @elseif($heading == 'home-page-blocks')
                            Home Page Blocks
                        @elseif($heading == 'general-settings')
                            General Settings
                        @endif
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <div class="card general_settings">

            {!! Form::open(['url' => 'update-application-settings', 'files' => true]) !!}
            <input type="hidden" name="url" value="{{ $heading }}" />

            <div class="card-body">

                <div class="row animation-form">
                    @foreach ($settings as $setting)
                        @if ($setting->input_type == 'heading')
                            <div class="col-12">
                                <h4 class="cat-title">{{ $setting->field_name }}</h4>
                            </div>
                        @else
                            <div
                                class="form-group {{ $setting->input_type == 'textarea' ? 'col-sm-12 textarea-section' : 'col-sm-4' }}">

                                @if ($setting->input_type == 'textbox')
                                    {!! Form::text($setting->id, $setting->value, ['class' => 'form-control datepicker']) !!}
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                @elseif($setting->input_type == 'select')
                                    @php($options = explode(',', $setting->options))
                                    <select class="form-control select2" name="{{ $setting->id }}">
                                        <option value="">{{ 'Select ' . $setting->field_name }}</option>
                                        @foreach ($options as $option)
                                            <option value="{{ $option }}"
                                                {{ $option == $setting->value ? 'selected' : '' }}>{{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                @elseif($setting->input_type == 'textarea')
                                    {!! Form::textarea($setting->id, $setting->value, ['class' => 'form-control']) !!}
                                    {!! Form::label($setting->id, $setting->field_name) !!}
                                    @push('page_scripts')
                                        <script>
                                            var editor{{ $setting->id }} = CKEDITOR.replace("{{ $setting->id }}");
                                            editor{{ $setting->id }}.config.allowedContent = true;
                                        </script>
                                    @endpush
                                @elseif($setting->input_type == 'file')
                                    <div class="input-group image_input">
                                        <div class="custom-file">
                                            {!! Form::file($setting->id, [
                                                'class' => 'custom-file-input',
                                                'onchange' =>
                                                    'readURL(this,
                                                                                                                                                                                                                                                            "image_preview' .
                                                    $setting->id .
                                                    '")',
                                            ]) !!}
                                            {!! Form::label($setting->id, $setting->field_name, ['class' => 'custom-file-label']) !!}
                                        </div>
                                    </div>
                                    <div id="image_preview{{ $setting->id }}"></div>
                                    @if ($setting->value != '')
                                        <p class="edit-image{{ $setting->id }} image_input_img">
                                            <img src="{{ asset('images/site-images/' . $setting->value) }}" alt=""
                                                height="50">
                                        </p>
                                    @endif
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('applicationSettings.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@include('common.image-preview')
