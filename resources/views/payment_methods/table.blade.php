<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Payment Method Name" value="{{ request()->get('search') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('paymentMethods.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $paymentMethods->total() }} Records Found</p>

    <div class="table-responsive" id="paymentMethod-sortable">
        <table class="table" id="payment-methods-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th>Payment Method Name</th>
                <th>Sandbox Key</th>
                <th>Sandbox Secret</th>
                <th>Live Key</th>
                <th>Live Secret</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-payment-methods'))<th>Publish</th>@endif
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($paymentMethods as $key => $paymentMethod)
                <tr class="row1" data-id="{{ $paymentMethod->id }}">
                    <td>{{ $paymentMethods->firstItem() + $key }}</td>
                    <td>{{ $paymentMethod->payment_method_name }}</td>
                    <td>{{ $paymentMethod->sandbox_key }}</td>
                    <td>{{ $paymentMethod->sandbox_secret }}</td>
                    <td>{{ $paymentMethod->live_key }}</td>
                    <td>{{ $paymentMethod->live_secret }}</td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-payment-methods'))
                        @include('common.make-publish', ['id' => $paymentMethod->id, 'publish' => $paymentMethod->publish, 'type' => 'paymentMethod'])
                    @endif
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['paymentMethods.destroy', $paymentMethod->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('paymentMethods.show', [$paymentMethod->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-payment-methods'))
                            <a href="{{ route('paymentMethods.edit', [$paymentMethod->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-payment-methods'))
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$paymentMethod->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $paymentMethods->appends(request()->query())])
        </div>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'paymentMethod-delete-form'])
@include('common.sortable', ['url' => 'paymentMethod-sortable'])