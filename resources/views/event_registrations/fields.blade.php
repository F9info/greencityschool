@include('event_form_common.event_form')

@php($additional_fields = json_decode($eventRegistration->additional_fields))

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Field1</th>
            <th>Field2</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($additional_fields as $fields)
            <tr>
                <td>{{ $fields->name }}</td>
                <td>{{ $fields->type }}</td>
                <td>{{ $fields->price }}</td>
                <td>{{ $fields->field1 }}</td>
                <td>{{ $fields->field2 }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                <h4 align="right">Final Amount
                    ${{ isset($eventRegistration) ? $eventRegistration->total_amount : null }}</h4>
            </td>
        </tr>
    </tbody>
</table>

<!-- Adult Count -->
<div class="form-group col-sm-3">
    {!! Form::text('adult_count', isset($eventRegistration) ? $eventRegistration->adult_count : null, [
        'class' => 'form-control ',
        'id' => 'adult_count',
    ]) !!}
    {!! Form::label('adult_count', 'Adult Count') !!}
</div>

<!-- Child Count -->
<div class="form-group col-sm-3">
    {!! Form::text('child_count', isset($eventRegistration) ? $eventRegistration->child_count : null, [
        'class' => 'form-control ',
        'id' => 'child_count',
    ]) !!}
    {!! Form::label('child_count', 'Child Count') !!}
</div>

<!-- Guests Count -->
<div class="form-group col-sm-3">
    {!! Form::text('guest_adult_count', isset($eventRegistration) ? $eventRegistration->guest_adult_count : null, [
        'class' => 'form-control ',
        'id' => 'guest_adult_count',
    ]) !!}
    {!! Form::label('guest_adult_count', 'Guests Count') !!}
</div>

<!-- Guest Child Count -->
<div class="form-group col-sm-3">
    {!! Form::text('guest_child_count', isset($eventRegistration) ? $eventRegistration->guest_child_count : null, [
        'class' => 'form-control ',
        'id' => 'guest_child_count',
    ]) !!}
    {!! Form::label('guest_child_count', 'Guest Child Count') !!}
</div>

<!-- card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">front_hand</span>
            Payment Transaction Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill Payment details)</p>
    </div>
</div>
<!-- card title end-->
<input type="hidden" name="tid" value="{{ isset($transaction) ? $transaction->id : null }}" />
<!-- card -->
<div class="card col-sm-12 ">
    <div class="card-body row">
        <!-- Membership Type Id Field -->
        <div class="form-group col-sm-3 select-area ">
            {!! Form::select(
                'payment_method',
                $paymentMethods,
                isset($transaction) ? ($transaction->payment_method_id != '' ? $transaction->paymentMethod->slug : null) : null,
                [
                    'class' => 'form-control select2',
                    'id' => 'payment_method',
                    isset($transaction) ? '' : 'required',
                    'placeholder' => 'Select Payment Method',
                ],
            ) !!}
            {!! Form::label('payment_method', 'Payment Method :') !!}
        </div>
        <!-- Payment Date  -->
        <div class="form-group col-sm-3">
            {!! Form::text('transaction_date', isset($transaction) ? formatDate($transaction->transaction_date) : null, [
                'class' => 'form-control',
                'id' => 'yeardatepicker',
                'required',
            ]) !!}
            {!! Form::label('transaction_date', ' Payment Date') !!}
        </div>
        <!-- Payment Status  -->
        <div class="form-group col-sm-3 select-area select-full-width">
            {!! Form::select(
                'payment_status',
                ['Pending' => 'Pending', 'Success' => 'Success'],
                isset($transaction) ? $transaction->payment_status : null,
                [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Payment Status',
                    'required',
                ],
            ) !!}
            {!! Form::label('payment_status', 'Payment Status:') !!}
        </div>

        <!-- Transaction Id  -->
        <div class="form-group col-sm-3">
            {!! Form::text('transaction_id', isset($transaction) ? $transaction->transaction_id : null, [
                'class' => 'form-control ',
                'id' => 'transaction_id',
                'required',
            ]) !!}
            {!! Form::label('transaction_id', ' Transaction Id') !!}
        </div>

        <div class="row col-sm-12 cheque_block" style="display:none;">
            <div class="col-sm-12">
                <h3>Cheque Details</h3>
            </div>
            <!-- Bank Name -->
            <div class="form-group col-sm-3">
                {!! Form::text('bank_name', isset($transaction) ? $transaction->bank_name : null, [
                    'class' => 'form-control ',
                    'id' => 'bank_name',
                ]) !!}
                {!! Form::label('bank_name', 'Bank Name') !!}
            </div>

            <!-- Cheque No -->
            <div class="form-group col-sm-3">
                {!! Form::text('cheque_no', isset($transaction) ? $transaction->cheque_no : null, [
                    'class' => 'form-control ',
                    'id' => 'cheque_no',
                ]) !!}
                {!! Form::label('cheque_no', 'Cheque No') !!}
            </div>

            <!-- Cheque Date -->
            <div class="form-group col-sm-3">
                {!! Form::text('cheque_date', isset($transaction) ? $transaction->cheque_date : null, [
                    'class' => 'form-control date',
                    'id' => 'cheque_date',
                ]) !!}
                {!! Form::label('cheque_date', 'Cheque Date') !!}
            </div>

            <!-- Cheque Amount -->
            <div class="form-group col-sm-3">
                {!! Form::text('cheque_amount', isset($transaction) ? $transaction->cheque_amount : null, [
                    'class' => 'form-control ',
                    'id' => 'cheque_amount',
                ]) !!}
                {!! Form::label('cheque_amount', 'Cheque Amount') !!}
            </div>
        </div>

    </div>
</div>
<!-- card end-->


@push('page_scripts')
    <script type="text/javascript">
        function CheckPaymentMethod(value) {
            if (value == 'cheque') {
                $('.cheque_block').show();
            } else {
                $('.cheque_block').hide();
            }
        }
        var paymentmethod =
            "{{ isset($transaction) ? ($transaction->payment_method_id != '' ? $transaction->paymentMethod->slug : null) : null }}";
        CheckPaymentMethod(paymentmethod);
        $(document).ready(function() {
            $('#payment_method').on('change', function() {
                CheckPaymentMethod(this.value);
            });
        });
    </script>
@endpush
