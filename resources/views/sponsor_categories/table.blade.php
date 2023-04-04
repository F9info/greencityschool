
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Category Name" value="{{ request()->get('search') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('sponsorCategories.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $sponsorCategories->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="sponsorCategories-sortable">
        <table class="table" id="sponsor-categories-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th class="sortablelink">@sortablelink('category_name', 'Category Name')</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-sponsor-categories'))<th>Publish</th>@endif
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($sponsorCategories as $key => $sponsorCategory)
                <tr class="row1" data-id="{{ $sponsorCategory->id }}">
                    <td>{{ $sponsorCategories->firstItem() + $key }}</td>
                    <td>{{ $sponsorCategory->category_name }}</td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-sponsor-categories'))
                        @include('common.make-publish', ['id' => $sponsorCategory->id, 'publish' => $sponsorCategory->publish, 'type' => 'sponsorCategory'])
                    @endif
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['sponsorCategories.destroy', $sponsorCategory->id], 'method' => 'delete', 'id' => 'sponsorCategory-delete-form'.$sponsorCategory->id]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('sponsorCategories.show', [$sponsorCategory->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-sponsor-categories'))
                            <a href="{{ route('sponsorCategories.edit', [$sponsorCategory->id]) }}"
                               class='btn btn-default btn-xs ajax-popup-link'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-sponsor-categories'))
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$sponsorCategory->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $sponsorCategories->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'sponsorCategory-delete-form'])
