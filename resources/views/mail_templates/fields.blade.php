<!-- Heading Field -->
<div class="form-group col-sm-6">

    {!! Form::text('heading', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('heading', 'Heading:') !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">

    {!! Form::text('subject', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('subject', 'Subject:') !!}
</div>

<!-- Mail Type Field -->
<div class="form-group select-area col-sm-6 ">

    {!! Form::select('mail_type', ['manual' => 'Manual', 'auto' => 'Auto'], null, [
        'class' => 'form-control select2',
        'required',
        'placeholder' => 'Mail Type',
    ]) !!}
    {!! Form::label('mail_type', 'Mail Type:') !!}
</div>

<!-- Description Field -->
<div class="form-group textarea-section col-sm-12 col-lg-12">

    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('description', 'Description:') !!}
</div>

@push('page_scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        var editor1 = CKEDITOR.replace('description');
        editor1.config.allowedContent = true;
    </script>
@endpush
