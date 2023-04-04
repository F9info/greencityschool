<div align="center" class="form-search">
    <form class="form-inline form-search" method="GET" action="">

        <div class="item">
            <label class="sr-only" for="inputSearch">Search</label>
            <input type="text" class="form-control " id="inputSearch" name="search"
                placeholder="First Name, Last Name, Email, Phone, Transaction Id"
                value="{{ request()->get('search') }}">
        </div>
        <div class="item">
            <label class="sr-only" for="inputDonationCause">Select Donation Cause</label>
            {!! Form::select('donation_cause', $categories, request()->get('donation_cause'), [
                'class' => 'form-control select2',
                'placeholder' => 'Select Donation Cause',
                'id' => 'inputDonationCause',
            ]) !!}
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
            <label class="sr-only" for="inputDonationFromDate">Donation From Date</label>
            <input type="text" name="donation_from_date" class="form-control dateyear" id="inputDonationFromDate"
                placeholder="Donation From Date" value="{{ request()->get('donation_from_date') }}">
        </div>
        <div class="item name-date show-year">
            <label class="sr-only" for="inputDonationToDate">Donation To Date</label>
            <input type="text" name="donation_to_date" class="form-control dateyear" id="inputDonationToDate"
                placeholder="Donation To Date" value="{{ request()->get('donation_to_date') }}">
        </div>

        <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
            <a href="{!! route('donations.index') !!}" class="btn btn-info mb-2">Reset</a>
        </div>

    </form>
</div>

<p class="record_count">{{ $donations->total() }} Records Found</p>
<div style="margin-bottom: 30px">
    <a href="{{ url('donations1/export/?search=' . request()->get('search') . '&donation_cause=' . request()->get('donation_cause') . '&payment_status=' . request()->get('payment_status') . '&donation_from_date=' . request()->get('donation_from_date') . '&donation_to_date=' . request()->get('donation_to_date')) }}"
        class="btn btn-secondary ">Export to Excel</a>
</div>


<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="donations-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('first_name', 'First Name')</th>
                    <th class="sortablelink">@sortablelink('last_name', 'Last Name')</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Donation Cause</th>
                    <th class="sortablelink">@sortablelink('amount', 'Amount')</th>
                    <th>Payment Method</th>
                    <th class="sortablelink">@sortablelink('transaction_id', 'Transaction ID')</th>
                    <th>Payment Status</th>
                    <th class="sortablelink">@sortablelink('transaction_id', 'Donation Date')</th>
                    <th>Donation Date</th>
                    <th align="center" style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $key => $donation)
                    <tr>
                        <td>{{ $donations->firstItem() + $key }}</td>
                        <td>{{ $donation->first_name }}</td>
                        <td>{{ $donation->last_name }}</td>
                        <td>{{ $donation->email }}</td>
                        <td>{{ $donation->phone_no }}</td>
                        <td>{{ $donation->donation_cause == 'Other' ? $donation->donation_cause_other : $donation->donation_cause }}
                        </td>
                        <td>{{ formatAmount($donation->amount) }}</td>
                        <td>{{ $donation->payment_method_name }}</td>
                        <td>{{ $donation->transaction_id }}</td>
                        <td>
                            @if ($donation->payment_status != null)
                                @if ($donation->payment_status == 'Success')
                                    <span class="btn btn-success btn-xs">Success</span>
                                @else
                                    <span class="btn btn-danger btn-xs">Pending</span>
                                @endif
                            @endif
                        </td>
                        <td>{{ formatDate($donation->created_at) }}</td>
                        <td align="center" style="text-align: center">
                            {!! Form::open([
                                'route' => ['donations.destroy', $donation->id],
                                'method' => 'delete',
                                'id' => 'donation-delete-form' . $donation->id,
                            ]) !!}
                            <div class='btn-group'>
                                <a href="{{ route('donations.show', [$donation->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>

                                @if(auth()->guard('admin')->user()->hasPermissionTo('edit-donations'))
                                <a href="{{ route('donations.edit', [$donation->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                @endif

                                @if(auth()->guard('admin')->user()->hasPermissionTo('delete-donations'))
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => 'deleteRecord(event, ' . $donation->id . ')',
                                ]) !!}
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
            @include('adminlte-templates::common.paginate', [
                'records' => $donations->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'donation-delete-form'])
