<!-- Field Name Field -->
<div class="col-sm-12">
    {!! Form::label('field_name', 'Field Name:') !!}
    <p>{{ $applicationSetting->field_name }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $applicationSetting->slug }}</p>
</div>

<!-- Input Type Field -->
<div class="col-sm-12">
    {!! Form::label('input_type', 'Input Type:') !!}
    <p>{{ $applicationSetting->input_type }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $applicationSetting->value }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $applicationSetting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $applicationSetting->updated_at }}</p>
</div>

