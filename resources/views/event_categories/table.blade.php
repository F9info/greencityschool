
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">
                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Event Category" value="{{ request()->get('search') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('eventCategories.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>
        </form>
    </div>

    <p class="record_count">{{ $eventCategories->total() }} Records Found</p>


    <div class="table-responsive">
        <table class="table" id="event-categories-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th class="sortablelink">@sortablelink('name', 'Name')</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-event-categories'))<th>Publish</th>@endif
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody id = 'tablecontents'>
            @foreach($eventCategories as $key => $eventCategory)
                <tr class="row1" data-id="{{ $eventCategory->id }}">
                    <td>{{ $eventCategories->firstItem() + $key }}</td>
                    <td>{{ $eventCategory->name }}</td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-event-categories'))
                        @include('common.make-publish', ['id' => $eventCategory->id, 'publish' => $eventCategory->publish, 'type' => 'eventCategory'])
                    @endif
                    <td  style="text-align: center">
                        {!! Form::open(['route' => ['eventCategories.destroy', $eventCategory->id], 'method' => 'delete', 'id' => 'eventCategory-delete-form'.$eventCategory->id]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('eventCategories.show', [$eventCategory->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            {{-- @endif --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-event-categories'))
                            <a href="{{ route('eventCategories.edit', [$eventCategory->id]) }}"
                               class='btn btn-default btn-xs ajax-popup-link'>
                                <i class="far fa-edit"></i>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-event-categories'))
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$eventCategory->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $eventCategories->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'eventCategory-delete-form'])
@include('common.sortable', ['url' => 'eventCategories-sortable'])