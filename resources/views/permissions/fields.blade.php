<!-- Name Field -->
<div class="form-group col-sm-12 popup_input">

    {!! Form::text('name', null, ['class' => 'form-control letters-input',  'required']) !!}
    {!! Form::label('name', 'Name', ['class' => 'span_required']) !!}

</div>

@include('common.ajax-popup')
