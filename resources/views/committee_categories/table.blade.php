
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Name" value="{{ request()->get('search') }}">
                </div>

                <div class="item">
                    <label class="sr-only" for="inputType">Select Type</label>
                    <select class="form-control mb-2 mr-sm-2 select2" id="inputType" name="type">
                        <option value="">Select Type</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}"
                            {{ request()->get('type') == $type->id ? 'selected' : '' }}>
                            {{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('committeeCategories.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $committeeCategories->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="committeeCategories-sortable">
        <table class="table" id="committee-categories-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th class="sortablelink">@sortablelink('name', 'Category Name')</th>
                <th class="sortablelink">@sortablelink('committeeCategoryType.type', 'Type')</th>
                <th>Category Name</th>
                <th>Type</th>
                <th>Members</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-committee-categories'))<th>Publish</th>@endif
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($committeeCategories as $key => $committeeCategory)
                <tr class="row1" data-id="{{ $committeeCategory->id }}">
                    <td>{{ $committeeCategories->firstItem() + $key }}</td>
                    <td>{{ $committeeCategory->name }}</td>
                    <td>{{ $committeeCategory->committee_category_type_id != '' ? $committeeCategory->committeeCategoryType->type : '' }}</td>
                    <td><a href="{{ url('committeeMembers?committee_category='.$committeeCategory->id) }}" class="btn btn-primary mb-2 mr-2">Members</a></td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-committee-categories'))
                        @include('common.make-publish', ['id' => $committeeCategory->id, 'publish' => $committeeCategory->publish, 'type' => 'committeeCategory'])
                    @endif
                    <td style="text-align: center" >
                        {!! Form::open(['route' => ['committeeCategories.destroy', $committeeCategory->id], 'method' => 'delete', 'id' => 'committeeCategory-delete-form'.$committeeCategory->id]) !!}
                        <div class='btn-group'>
                            {{-- @if(auth()->user()->hasPermissionTo('view-products')) --}}
                            {{-- <a href="{{ route('committeeCategories.show', [$committeeCategory->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            {{-- @endif --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-committee-categories'))
                            <a href="{{ route('committeeCategories.edit', [$committeeCategory->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-committee-categories'))
                            {!! Form::button('<span class="material-symbols-outlined">delete</span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$committeeCategory->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $committeeCategories->appends(request()->query())])
        </div>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'committeeCategory-delete-form'])