<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">
            <label class="sr-only" for="inputSearch">Search</label>
            <input type="text" class="form-control mb-2 mr-sm-2 col-sm-2" id="inputSearch" name="search"
                placeholder="Name" value="{{ request()->get('search') }}">

            <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
            <a href="{!! route('categories.index') !!}" class="btn btn-info mb-2">Reset</a>
        </form>
    </div>

    <p class="record_count">{{ $categories->total() }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="categories-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th>Name</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $key }}</td>
                        <td>{{ $category->name }}</td>
                        <td style="text-align:center">
                            {!! Form::open([
                                'route' => ['categories.destroy', $category->id],
                                'method' => 'delete',
                                'id' => 'category-delete-form' . $category->id,
                            ]) !!}
                            <div class='btn-group'>
                                <a href="{{ route('categories.show', [$category->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                @if(auth()->guard('admin')->user()->hasPermissionTo('edit-developer-settings-categories'))
                                <a href="{{ route('categories.edit', [$category->id]) }}"
                                    class='btn btn-default btn-xs ajax-popup-link'>
                                    <i class="far fa-edit"></i>
                                </a>
                                @endif

                                @if(auth()->guard('admin')->user()->hasPermissionTo('delete-developer-settings-categories'))
                                {!! Form::button(
                                    '<span class="material-symbols-outlined">
                                delete
                                </span>',
                                    ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'deleteRecord(event, ' . $category->id . ')'],
                                ) !!}
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
                'records' => $categories->appends(request()->query()),
            ])
        </div>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'category-delete-form'])
