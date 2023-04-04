<!-- Name Field -->
<div class="form-group col-sm-12 popup_input ">
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter Event Category Name']) !!}
    {!! Form::label('name', 'Event Category Name:') !!}
</div>

@include('common.ajax-popup')
