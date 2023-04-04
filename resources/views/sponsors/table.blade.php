
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Sponsor Category, Title" value="{{ request()->get('search') }}">
                </div>
                <div class="item">
                    <label class="sr-only" for="inputCategory">Select Category</label>
                    <select class="form-control mb-2 mr-sm-2 select2" id="inputCategory" name="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('sponsors.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $sponsors->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="sponsors-sortable">
        <table class="table" id="sponsors-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th>Category</th>
                <th class="sortablelink">@sortablelink('title', 'Title')</th>
                <th>Title</th>
                <th>Image</th>
                <th>Url</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-sponsors'))<th>Publish</th>@endif
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @foreach($sponsors as $key => $sponsor)
                <tr class="row1" data-id="{{ $sponsor->id }}">
                    <td>{{ $sponsors->firstItem() + $key }}</td>
                    <td>{{ $sponsor->sponsor_category_id != '' ? $sponsor->sponsorCategory->category_name : '' }}</td>
                    <td>{{ $sponsor->title }}</td>
                    <td><img src="{{ asset('images/sponsor/'.$sponsor->image) }}" height="50" /></td>
                    <td>{{ $sponsor->url }}</td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-sponsors'))
                        @include('common.make-publish', ['id' => $sponsor->id, 'publish' => $sponsor->publish, 'type' => 'sponsor'])
                    @endif
                    <td style="text-align: center">
                        {!! Form::open(['route' => ['sponsors.destroy', $sponsor->id], 'method' => 'delete', 'id' => 'sponsor-delete-form'.$sponsor->id]) !!}
                        <div class='btn-group'>

                            {{-- <a href="{{ route('sponsors.show', [$sponsor->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a> --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-sponsors'))
                            <a href="{{ route('sponsors.edit', [$sponsor->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif
                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-sponsors'))
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$sponsor->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $sponsors->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'sponsor-delete-form'])
@include('common.sortable', ['url' => 'sponsors-sortable'])