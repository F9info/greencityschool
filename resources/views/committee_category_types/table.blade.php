<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">


                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 col-sm-2" id="inputSearch" name="search"
                        placeholder="Type" value="{{ request()->get('search') }}">



                    <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('committeeCategoryTypes.index') !!}" class="btn btn-info mb-2">Reset</a>


        </form>
    </div>

    <p class="record_count">{{ $committeeCategoryTypes->total() }} Records Found</p>
    <div class="table-responsive" id="committeeCategoryType-sortable">
        <table class="table" id="committee-category-types-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th class="sortablelink">@sortablelink('type', 'Type')</th>
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($committeeCategoryTypes as $key => $committeeCategoryType)
                <tr class="row1" data-id="{{ $committeeCategoryType->id }}">
                    <td>{{ $committeeCategoryTypes->firstItem() + $key }}</td>
                    <td>{{ $committeeCategoryType->type }}</td>
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['committeeCategoryTypes.destroy', $committeeCategoryType->id], 'method' => 'delete', 'id' => 'committeeCategoryType-delete-form'.$committeeCategoryType->id]) !!}
                        <div class='btn-group'>
                            {{-- @if(auth()->user()->hasPermissionTo('view-products')) --}}
                            {{-- <a href="{{ route('committeeCategoryTypes.show', [$committeeCategoryType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            {{-- @endif --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-committee-category-types'))
                            <a href="{{ route('committeeCategoryTypes.edit', [$committeeCategoryType->id]) }}"
                               class='btn btn-default btn-xs ajax-popup-link'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-committee-category-types'))
                            {!! Form::button('<span class="material-symbols-outlined"> delete </span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$committeeCategoryType->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $committeeCategoryTypes->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'committeeCategoryType-delete-form'])
