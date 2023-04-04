<!-- Name Field -->
<div class="form-group popup_input col-sm-8">

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
    {!! Form::label('name', 'Name:', ['class' => 'span_required']) !!}

</div>

<!-- Year Field -->
<div class="form-group popup_input col-sm-4 numbers-input">

    {!! Form::number('year', null, [
        'class' => 'form-control numbers-input',
        'required',
        'data-parsley-pattern' => '[0-9]*',
        'numbers-input',
        'maxlength' => '4',
        'minlength' => '4',
        'inputmode' => 'numeric',
    ]) !!}
    {!! Form::label('year', 'Year:', ['class' => 'span_required']) !!}

</div>


@include('common.ajax-popup')
