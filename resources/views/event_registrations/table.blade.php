<div class="card-body p-0">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="" autocomplete="off">
            <div class="item">
                <label class="sr-only" for="inputSearch">Search</label>
                <input type="text" class="form-control " id="inputSearch" name="search"
                    placeholder="Name, Email, Phone, Gender" value="{{ request()->get('search') }}">
            </div>
            <div class="item">
                <label class="sr-only" for="inputEvent">Select Event</label>
                <select class="form-control mb-2 mr-sm-2 select2" id="inputEvent" name="event">
                    <option value="">Select Event</option>
                    @foreach($events as $event)
                    <option value="{{ $event->id }}"
                        {{ request()->get('event') == $event->id ? 'selected' : '' }}>
                        {{ $event->event_name }}</option>
                    @endforeach
                </select>
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
                <label class="sr-only" for="inputFromDate">From Date</label>
                <input type="text" name="from_date" class="form-control dateyear" id="inputFromDate"
                    placeholder="From Date" value="{{ request()->get('from_date') }}">
            </div>
            <div class="item name-date show-year">
                <label class="sr-only" for="inputToDate">To Date</label>
                <input type="text" name="to_date" class="form-control dateyear" id="inputToDate"
                    placeholder="To Date" value="{{ request()->get('to_date') }}">
            </div>

            <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                <a href="{!! route('eventRegistrations.index') !!}" class="btn btn-info mb-2">Reset</a>
            </div>
        </form>
    </div>
    <p class="record_count">{{ $eventRegistrations->total() }} Records Found</p>
    <a href="{{ url('eventRegistrations1/export/?search=' . request()->get('search') . '&event=' . request()->get('event') . '&payment_method=' . request()->get('payment_method') . '&payment_status=' . request()->get('payment_status') . '&from_date=' . request()->get('from_date') . '&to_date=' . request()->get('to_date')) }}"
        class="btn btn-secondary ">Export to Excel</a>
    <div class="table-responsive">
        <p align="right"><b>Count : Adults-Children-Guests-Guest Children</b></p>
        <table class="table" id="event-registrations-table">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th class="sortablelink">@sortablelink('first_name', 'First Name')</th>
                    <th class="sortablelink">@sortablelink('last_name', 'Last Name')</th>
                    <th class="sortablelink">@sortablelink('id', 'Registration Id')</th>
                    <th class="sortablelink">@sortablelink('id', 'Registration Date')</th>
                    <th>Is Member</th>
                    <th>Count</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Transaction Id</th>
                    <th>Payment Status</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($eventRegistrations as $key => $eventRegistration)
                <tr>
                    <tr>
                    <td>{{ $eventRegistrations->firstItem() + $key }}</td>
                    <td>{{ $eventRegistration->first_name }}</td>
                    <td>{{ $eventRegistration->last_name }}</td>
                    <td>{{ $eventRegistration->id }}</td>
                    <td>{{ formatDate($eventRegistration->created_at) }}</td>
                    <td>{{ $eventRegistration->user_id != null ? 'yes' : 'no' }}</td>
                    <td>{{ $eventRegistration->adult_count . " - " . $eventRegistration->child_count . " - " . $eventRegistration->guest_adult_count . " - " . $eventRegistration->guest_child_count }}</td>
                    <td>{{ $eventRegistration->total_amount }}</td>
                    <td>{{ $eventRegistration->transaction != null ? ($eventRegistration->transaction->paymentMethod != null ? $eventRegistration->transaction->paymentMethod->payment_method_name : '') : '' }}</td>
                    <td>{{ $eventRegistration->transaction != null ? $eventRegistration->transaction->transaction_id : '' }}</td>
                    <td>
                        @if($eventRegistration->transaction != null)
                            @if ($eventRegistration->transaction->payment_status == 'Success')
                                <span class="btn btn-success btn-xs">Success</span>
                            @else
                                <span class="btn btn-danger btn-xs">Pending</span>
                            @endif
                        @endif
                    </td>
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['eventRegistrations.destroy', $eventRegistration->id], 'method' => 'delete', 'id' => 'eventRegistration-delete-form'.$eventRegistration->id]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('eventRegistrations.show', [$eventRegistration->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-event-registrations'))
                            <a href="{{ route('eventRegistrations.edit', [$eventRegistration->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-event-registrations'))
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$eventRegistration->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $eventRegistrations->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'eventRegistration-delete-form'])