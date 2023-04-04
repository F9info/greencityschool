<div class="card-body p-0">
    <div align="center" class="form-search members_search">
        <h4>Search</h4>
        <form class="form-inline " method="GET" action="">
            <div class="item name-item">
                <label class="sr-only" for="inputSearch">Search</label>
                <input type="text" class="form-control " id="inputSearch" name="search"
                    placeholder="Member Id/First Name/Last Name/Email/Phone/Spouse/City"
                    value="{{ request()->get('search') }}">
            </div>
            <div class="item">
                <label class="sr-only" for="inputCategory">Select Membership Type</label>
                {!! Form::select('membership_type', $membershiptypes, request()->get('membership_type'), [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Membership Type',
                ]) !!}
            </div>
            <div class="item name-date show-year">
                <label class="sr-only" for="inputRegFromDate">Registration From Date</label>
                <input type="text" name="reg_from_date" class="form-control dateyear" id="inputRegFromDate"
                    placeholder="Registration From Date" value="{{ request()->get('reg_from_date') }}">
            </div>
            <div class="item name-date show-year">
                <label class="sr-only" for="inputRegToDate">Registration To Date</label>
                <input type="text" name="reg_to_date" class="form-control dateyear" id="inputRegToDate"
                    placeholder="Registration To Date" value="{{ request()->get('reg_to_date') }}">
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
            <div class="item">
                <label class="sr-only" for="inputMembershipStatus">Select Membership Status</label>
                {!! Form::select('membership_status', ['1' => 'Active', '0' => 'Expired'], request()->get('membership_status'), [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Membership Status',
                    'id' => 'inputMembershipStatus',
                ]) !!}
            </div>
            <div class="item name-date  show-year">
                <label class="sr-only" for="inputExpireFromDate">Expire From Date</label>
                <input type="text" name="expire_from_date" class="form-control dateyear" id="inputExpireFromDate"
                    placeholder="Expire From Date" value="{{ request()->get('expire_from_date') }}">
            </div>
            <div class="item name-date  show-year">
                <label class="sr-only" for="inputExpireToDate">Expire To Date</label>
                <input type="text" name="expire_to_date" class="form-control dateyear" id="inputExpireToDate"
                    placeholder="Expire To Date" value="{{ request()->get('expire_to_date') }}">
            </div>
            <div class="item">
                <label class="sr-only" for="inputMemberStatus">Select Member Status</label>
                {!! Form::select('member_status', [1 => 'Active', 0 => 'Inactive'], request()->get('member_status'), [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Member Status',
                    'id' => 'inputMemberStatus',
                ]) !!}
            </div>
            <div class="item name-intersts name_placeholder">
                <label class="sr-only" for="inputCategory">Select Membership Interests</label>
                {!! Form::select('membership_interests[]', $memberinterests, request()->get('membership_interests'), [
                    'class' => 'form-control select2',

                    'multiple',
                ]) !!}

            </div>

            <div class="item full_item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                <a href="{!! route('personalDetails.index') !!}" class="btn btn-info mb-2">Reset</a>
            </div>
        </form>
    </div>



    <!-- Main Header -->
    {{-- <nav class="navbar navbar-expand column-settings fright">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                    Column Settings <span class="caret"></span>
                </a>
                <div class="dropdown-menu">
                    <p class="select_all_check"><input type="checkbox" class="selectAll" id="selectAll"
                            value="selectAll" />&nbsp;
                        <label for="selectAll">Select All</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_3" />&nbsp;
                        <label for="col_3">Last Name</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_4" />&nbsp;
                        <label for="col_4">Email id</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_5" />&nbsp;
                        <label for="col_5">Phone no.</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_6" />&nbsp;
                        <label for="col_6">Membership</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_7" />&nbsp;
                        <label for="col_7">Expiry Date</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_8" />&nbsp;
                        <label for="col_8">Membership Status</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_9" />&nbsp;
                        <label for="col_9">Payment Method</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_10" />&nbsp;
                        <label for="col_10">Payment Status</label>
                    </p>
                    <p><input type="checkbox" class="hidecol" value="Lead Type" id="col_11" />&nbsp;
                        <label for="col_11">Transaction Id</label>
                    </p>
                </div>
            </li>
        </ul>
    </nav> --}}

    <div class="clear"></div>

    <div class="upload_excel">
        <p class="record_count">{{ $personalDetails->total() }} Records Found</p>
        <a href="{{ url('personalDetails1/export/?search=' . request()->get('search') . '&membership_type=' . request()->get('membership_type') . '&reg_from_date=' . request()->get('reg_from_date') . '&reg_to_date=' . request()->get('reg_to_date') . '&payment_status=' . request()->get('payment_status') . '&membership_status=' . request()->get('membership_status') . '&expire_from_date=' . request()->get('expire_from_date') . '&expire_to_date=' . request()->get('expire_to_date') . '&member_status=' . request()->get('member_status') . '&membership_interests=' . json_encode(request()->get('membership_interests'))) }}"
            class="btn btn-secondary ">Export to Excel</a>

        <div class="clear"></div>
    </div>



    <div class="table-responsive">
        <table class="table text-nowrap column-settings-table" id="personal-details-table">
            <thead>
                <tr>
                    <th class="sortablelink">@sortablelink('user_id', 'Id')</th>
                    <th class="sortablelink">@sortablelink('users.first_name', 'Name')</th>
                    <th class="white_space">Email </th>
                    <th>Phone no.</th>
                    <th>Membership</th>
                    <th class="sortablelink">@sortablelink('users.expiry_date', 'Expiry Date')</th>
                    <th>Membership Status</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th class="white_space sortablelink">@sortablelink('transactions.transaction_id', 'Transaction Id')</th>
                    <th class="sortablelink">@sortablelink('created_at', 'Created At')</th>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-members'))<th>Publish</th>@endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personalDetails as $key => $personalDetail)
                    <tr>
                        <td>{{ $personalDetail->user_id }}</td>
                        <td>{{ $personalDetail->first_name }} {{ $personalDetail->last_name }}</td>

                        <td class="white_space">{{ $personalDetail->email }}</td>
                        <td>{{ $personalDetail->phone_no }}</td>
                        <td>{{ $personalDetail->membership_name }}</td>
                        <td>{{ formatDate($personalDetail->expiry_date) }}</td>
                        <td>
                            @if (userExpiryStatus($personalDetail->expiry_date))
                                <span class="btn btn-success btn-xs">Active</span>
                            @else
                                <span class="btn btn-danger btn-xs">Expired</span>
                            @endif
                        </td>
                        <td>{{ $personalDetail->payment_method_name }}</td>
                        <td>
                            @if ($personalDetail->payment_status == 'Success')
                                <span class="btn btn-success btn-xs">Success</span>
                            @else
                                <span class="btn btn-danger btn-xs">Pending</span>
                            @endif
                        </td>
                        <td class="white_space">{{ $personalDetail->transaction_id }}</td>
                        <td>{{ formatDate($personalDetail->created_at) }}</td>
                        @if(auth()->guard('admin')->user()->hasPermissionTo('publish-members'))
                            @include('common.make-publish', [
                                'id' => $personalDetail->user_id,
                                'publish' => $personalDetail->publish,
                                'type' => 'user',
                            ])
                        @endif
                        <td style="text-align:center">
                            {!! Form::open([
                                'route' => ['personalDetails.destroy', $personalDetail->id],
                                'method' => 'delete',
                                'id' => 'personalDetail-delete-form' . $personalDetail->id,
                            ]) !!}
                            <div class='btn-group'>
                                <a href="{{ route('personalDetails.show', [$personalDetail->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if(auth()->guard('admin')->user()->hasPermissionTo('edit-members'))
                                <a href="{{ route('personalDetails.edit', [$personalDetail->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                @endif

                                @if(auth()->guard('admin')->user()->hasPermissionTo('delete-members'))
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => 'deleteRecord(event, ' . $personalDetail->id . ')',
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
                'records' => $personalDetails->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'personalDetail-delete-form'])
@include('membership_form_common.datepicker')
