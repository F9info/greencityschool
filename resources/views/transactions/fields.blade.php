<!-- Reference Field -->
<div class="form-group col-sm-6">

    {!! Form::text('reference', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('reference', 'Reference:') !!}
</div>

<!-- Transaction Id Field -->
<div class="form-group col-sm-6">

    {!! Form::text('transaction_id', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">

    {!! Form::text('amount', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('amount', 'Amount:') !!}
</div>

<!-- Transaction Date Field -->
<div class="form-group col-sm-6">

    {!! Form::text('transaction_date', null, ['class' => 'form-control', 'id' => 'transaction_date', 'required']) !!}
    {!! Form::label('transaction_date', 'Transaction Date:') !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#transaction_date').datepicker()
    </script>
@endpush

<!-- Payment Method Id Field -->
<div class="form-group col-sm-6">

    {!! Form::text('payment_method_id', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
</div>

<!-- Payment Status Field -->
<div class="form-group col-sm-6">

    {!! Form::text('payment_status', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('payment_status', 'Payment Status:') !!}
</div>

<!-- Bank Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
    {!! Form::label('bank_name', 'Bank Name:') !!}
</div>

<!-- Cheque No Field -->
<div class="form-group col-sm-6">

    {!! Form::text('cheque_no', null, ['class' => 'form-control']) !!}
    {!! Form::label('cheque_no', 'Cheque No:') !!}
</div>

<!-- Cheque Date Field -->
<div class="form-group col-sm-6">

    {!! Form::text('cheque_date', null, ['class' => 'form-control']) !!}
    {!! Form::label('cheque_date', 'Cheque Date:') !!}
</div>

<!-- Cheque Amount Field -->
<div class="form-group col-sm-6">

    {!! Form::text('cheque_amount', null, ['class' => 'form-control']) !!}
    {!! Form::label('cheque_amount', 'Cheque Amount:') !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">

    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
    {!! Form::label('user_id', 'User Id:') !!}
</div>

<!-- Event Id Field -->
<div class="form-group col-sm-6">

    {!! Form::text('event_id', null, ['class' => 'form-control']) !!}
    {!! Form::label('event_id', 'Event Id:') !!}
</div>

<!-- Admin Comment Field -->
<div class="form-group col-sm-12 col-lg-12">

    {!! Form::textarea('admin_comment', null, ['class' => 'form-control']) !!}
    {!! Form::label('admin_comment', 'Admin Comment:') !!}
</div>

<!-- User Comment Field -->
<div class="form-group col-sm-12 col-lg-12">

    {!! Form::textarea('user_comment', null, ['class' => 'form-control']) !!}
    {!! Form::label('user_comment', 'User Comment:') !!}
</div>
