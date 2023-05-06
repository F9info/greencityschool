<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="service-categories-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Display Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($serviceCategories as $serviceCategory)
                <tr>
                    <td>{{ $serviceCategory->name }}</td>
                    <td>{{ $serviceCategory->display_name }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['serviceCategories.destroy', $serviceCategory->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('serviceCategories.show', [$serviceCategory->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('serviceCategories.edit', [$serviceCategory->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $serviceCategories])
        </div>
    </div>
</div>
