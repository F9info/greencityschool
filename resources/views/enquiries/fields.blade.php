<!-- Name Field -->
<div class="form-group  letters-input col-sm-6">

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => '50']) !!}
    {!! Form::label('name', 'Name:', ['class' => 'span_required']) !!}

</div>

<!-- Email Field -->
<div class="form-group col-sm-6">

    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('email', 'Email:', ['class' => 'span_required']) !!}

</div>

<!-- Phone Field -->
<div class="form-group  numbers-input col-sm-6">

    {!! Form::text('phone', null, ['class' => 'form-control', 'required', 'maxlength' => '10', 'minlength' => '10']) !!}
    {!! Form::label('phone', 'Phone:', ['class' => 'span_required']) !!}

</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">

    {!! Form::text('subject', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('subject', 'Subject:', ['class' => 'span_required']) !!}

</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">

    {!! Form::textarea('message', null, ['class' => 'form-control', 'required', 'minlength' => '50']) !!}
    {!! Form::label('message', 'Message:', ['class' => 'span_required']) !!}

</div>
