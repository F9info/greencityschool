<!-- Type Field -->
<div class="form-group col-sm-12 popup_input">

    {!! Form::text('type', null, ['class' => 'form-control', 'required',  'maxlength' => '100']) !!}
    {!! Form::label('type', 'Create new Committee Category Type:', ['class' => 'span_required']) !!}

</div>
@include('common.ajax-popup')
