<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Interest" value="{{ request()->get('search') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('memberInterests.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <p class="record_count">{{ $memberInterests->total() }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="member-interests-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th class="sortablelink">@sortablelink('interests', 'Interest')</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-membership-interests'))<th>Publish</th>@endif
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($memberInterests as $key => $memberInterest)
                <tr class="row1" data-id="{{ $memberInterest->id }}">
                    <td>{{ $memberInterests->firstItem() + $key }}</td>
                    <td>{{ $memberInterest->interests }}</td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-membership-interests'))
                        @include('common.make-publish', ['id' => $memberInterest->id, 'publish' => $memberInterest->publish, 'type' => 'memberInterest'])
                    @endif
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['memberInterests.destroy', $memberInterest->id], 'method' => 'delete', 'id' => 'memberInterest-delete-form'.$memberInterest->id]) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ route('memberInterests.show', [$memberInterest->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            {{-- @endif --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-membership-interests'))
                            <a href="{{ route('memberInterests.edit', [$memberInterest->id]) }}"
                               class='btn btn-default btn-xs ajax-popup-link'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-membership-interests'))
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$memberInterest->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $memberInterests->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'memberInterest-delete-form'])
@include('common.sortable', ['url' => 'memberInterests-sortable'])