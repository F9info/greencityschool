<!-- Payment Method Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('payment_method_name', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('payment_method_name', 'Payment Method Name:') !!}
</div>

<!-- Display Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('display_name', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('display_name', 'Display Name:') !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">

    {!! Form::text('slug', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('slug', 'Slug:') !!}
</div>

<!-- Sandbox Key Field -->
<div class="form-group col-sm-6">

    {!! Form::text('sandbox_key', null, ['class' => 'form-control']) !!}
    {!! Form::label('sandbox_key', 'Sandbox Key:') !!}
</div>

<!-- Sandbox Secret Field -->
<div class="form-group col-sm-6">

    {!! Form::text('sandbox_secret', null, ['class' => 'form-control']) !!}
    {!! Form::label('sandbox_secret', 'Sandbox Secret:') !!}
</div>

<!-- Live Key Field -->
<div class="form-group col-sm-6">

    {!! Form::text('live_key', null, ['class' => 'form-control']) !!}
    {!! Form::label('live_key', 'Live Key:') !!}
</div>

<!-- Live Secret Field -->
<div class="form-group col-sm-6">

    {!! Form::text('live_secret', null, ['class' => 'form-control']) !!}
    {!! Form::label('live_secret', 'Live Secret:') !!}
</div>
