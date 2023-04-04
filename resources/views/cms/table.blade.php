
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">


                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Title, Slug, Parent" value="{{ request()->get('search') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('cms.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $cms->total() }} Records Found</p>

    <div class="table-responsive" id="cms-sortable">
        <table class="table" id="cms-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('title', 'Title')</th>
                    <th>Slug</th>
                    <th class="sortablelink">@sortablelink('parent', 'Parent')</th>
                    <th>Front View</th>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-pages'))<th>Publish</th>@endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach($cms as $key => $cm)
                <tr class="row1" data-id="{{ $cm->id }}">
                    <td>{{ $cms->firstItem() + $key }}</td>
                    <td>{{ $cm->title }}</td>
                    <td>{{ $cm->slug }}</td>
                    <td>{{ $cm->parent != 'root' ? $cm->parentName->title : 'root' }}</td>
                    <td>
                        @if($cm->type == 'pageview')
                        <a href="{{ url('/pages/'.$cm->slug) }}" target="_blank" class="btn btn-info btn-sm">Front
                            View</a>
                        @endif
                    </td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-pages'))
                        @include('common.make-publish', ['id' => $cm->id, 'publish' => $cm->publish, 'type' => 'cm'])
                    @endif
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['cms.destroy', $cm->id], 'method' => 'delete', 'id' =>
                        'cms-delete-form'.$cm->id]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('cms.show', [$cm->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-pages'))
                            <a href="{{ route('cms.edit', [$cm->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif
                            
                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-pages'))
                            {!! Form::button('<span class="material-symbols-outlined">delete</span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$cm->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $cms->appends(request()->query())])
        </div>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'cms-delete-form'])
@include('common.sortable', ['url' => 'cms-sortable'])
