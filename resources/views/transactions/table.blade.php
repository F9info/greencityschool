<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="" autocomplete="off">
                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Reference, Transaction Id, Amount" value="{{ request()->get('search') }}">
                </div>
                <div class="item">
                    <label class="sr-only" for="inputPaymentMethod">Select Payment Method</label>
                    {!! Form::select(
                        'payment_method',
                        $paymentMethods,
                        request()->get('payment_method'),
                        [
                            'class' => 'form-control select2',
                            'placeholder' => 'Select Payment Method',
                            'id' => 'inputPaymentMethod',
                        ],
                    ) !!}
                </div>
                <div class="item">
                    <label class="sr-only" for="inputPaymentStatus">Select Payment Status</label>
                    {!! Form::select(
                        'payment_status',
                        ['Pending' => 'Pending', 'Success' => 'Success'],
                        request()->get('payment_status'),
                        [
                            'class' => 'form-control select2',
                            'placeholder' => 'Select Payment Status',
                            'id' => 'inputPaymentStatus',
                        ],
                    ) !!}
                </div>
                <div class="item name-date show-year">
                    <label class="sr-only" for="inputTransactionFromDate">Transaction From Date</label>
                    <input type="text" name="from_date" class="form-control dateyear" id="inputTransactionFromDate"
                        placeholder="Transaction From Date" value="{{ request()->get('from_date') }}">
                </div>
                <div class="item name-date show-year">
                    <label class="sr-only" for="inputTransactionToDate">Transaction To Date</label>
                    <input type="text" name="to_date" class="form-control dateyear" id="inputTransactionToDate"
                        placeholder="Transaction To Date" value="{{ request()->get('to_date') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('transactions.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $transactions->total() }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="transactions-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th>Reference</th>
                <th>Transaction Id</th>
                <th>Amount</th>
                <th>Transaction Date</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Bank Name</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>
                <th>Cheque Amount</th>
                <th>User Id</th>
                <th>Event Id</th>
                <th>Admin Comment</th>
                <th>User Comment</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $key => $transaction)
                <tr>
                    <td>{{ $transactions->firstItem() + $key }}</td>
                    <td>{{ $transaction->reference }}</td>
                    <td>{{ $transaction->transaction_id }}</td>
                    <td>{!! formatAmount($transaction->amount) !!}</td>
                    <td>{{ formatDate($transaction->transaction_date) }}</td>
                    <td>{{ $transaction->payment_method_id != '' ? $transaction->paymentMethod->payment_method_name : '' }}</td>
                    <td>{{ $transaction->payment_status }}</td>
                    <td>{{ $transaction->bank_name }}</td>
                    <td>{{ $transaction->cheque_no }}</td>
                    <td>{{ formatDate($transaction->cheque_date) }}</td>
                    <td>{!! $transaction->cheque_amount != '' ? formatAmount($transaction->cheque_amount) : '' !!}</td>
                    <td>{{ $transaction->user_id }}</td>
                    <td>{{ $transaction->event_id }}</td>
                    <td>{{ $transaction->admin_comment }}</td>
                    <td>{{ $transaction->user_comment }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('transactions.show', [$transaction->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-transactions'))
                                {{-- <a href="{{ route('transactions.edit', [$transaction->id]) }}"
                                class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a> --}}
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-transactions'))
                                {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $transactions])
        </div>
    </div>
</div>
