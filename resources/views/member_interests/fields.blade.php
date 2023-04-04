<!-- Interests Field -->
<div class="form-group col-sm-12 popup_input">

    {!! Form::text('interests', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('interests', 'Interests:', ['class' => 'span_required']) !!}

</div>

@include('common.ajax-popup')
