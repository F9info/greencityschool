<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">
            <div class="item">
                <label class="sr-only" for="inputSearch">Search</label>
                <input type="text" class="form-control " id="inputSearch" name="search"
                    placeholder="Membership Name, Price" value="{{ request()->get('search') }}">
            </div>

            <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                <a href="{!! route('membershipTypes.index') !!}" class="btn btn-info mb-2">Reset</a>
            </div>
        </form>
    </div>

    <p class="record_count">{{ $membershipTypes->total() }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="membership-types-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th class="sortablelink">@sortablelink('membership_name', 'Membership Name')</th>
                <th class="sortablelink">@sortablelink('price', 'Price')</th>
                <th>Life Time</th>
                <th>Months</th>
                <th>Expiry Date</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-membership-types'))<th>Publish</th>@endif
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($membershipTypes as $key => $membershipType)
                <tr class="row1" data-id="{{ $membershipType->id }}">
                    <td>{{ $membershipTypes->firstItem() + $key }}</td>
                    <td>{{ $membershipType->membership_name }}</td>
                    <td>{{ $membershipType->price }}</td>
                    <td>{{ $membershipType->lifetime == 1 ? 'yes' : '' }}</td>
                    <td>{{ $membershipType->months }}</td>
                    <td>{{ formatDate($membershipType->expiry_date) }}</td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-membership-types'))
                        @include('common.make-publish', ['id' => $membershipType->id, 'publish' => $membershipType->publish, 'type' => 'membershipType'])
                    @endif
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['membershipTypes.destroy', $membershipType->id], 'method' => 'delete', 'id' => 'membershipType-delete-form'.$membershipType->id]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('membershipTypes.show', [$membershipType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            {{-- @endif --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-membership-types'))
                            <a href="{{ route('membershipTypes.edit', [$membershipType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-membership-types'))
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$membershipType->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $membershipTypes->appends(request()->query())])
        </div>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'membershipType-delete-form'])
@include('common.sortable', ['url' => 'membershipTypes-sortable'])