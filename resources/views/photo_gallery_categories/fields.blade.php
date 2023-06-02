<!-- Name Field -->
<div class="form-group popup_input col-sm-8">

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => '50']) !!}
    {!! Form::label('name', 'Name:', ['class' => 'span_required']) !!}

</div>

<!-- Year Field -->
<div class="numbers-input form-group  popup_input col-sm-4">

    {!! Form::number('year', null, [
        'class' => 'form-control digitsonly',  
        'data-parsley-pattern'=>'[0-9]*',
        'maxlength' => '4',
        'minlength' => '4',
        'inputmode'=>'numeric',
    ]) !!}
    {!! Form::label('year', 'Year:', ['class' => 'span_requiredss']) !!}

</div>

@include('common.ajax-popup')
