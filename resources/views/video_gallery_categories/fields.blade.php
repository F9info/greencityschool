<!-- Name Field -->
<div class="form-group popup_input col-sm-8">

    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('name', 'Name:', ['class' => 'span_required']) !!}

</div>

<!-- Year Field -->
<div class="form-group numbers-input popup_input col-sm-4">

    {!! Form::number('year', null, [
        'class' => 'form-control digitsonly',
        'required',
        'data-parsley-pattern' => '[0-9]*',
        'maxlength' => '4',
        'minlength' => '4',
        'inputmode'=>'numeric',
    ]) !!}
    {!! Form::label('year', 'Year:', ['class' => 'span_required']) !!}

</div>

@include('common.ajax-popup')
