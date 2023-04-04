<div class="table-responsive">
    <table class="table" id="permissions-table">
        <thead>
        <tr>
            <th>Sl no.</th>
            <th>Name</th>
            <th style="text-align:center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $key => $permission)
            <tr>
                <td>{{ $permissions->firstItem() + $key }}</td>
                <td>{!! $permission->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete', 'id'=>'permission-delete-form'.$permission->id]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('permissions.show', [$permission->id]) !!}" class='btn btn-default btn-xs'>
                            <span class="material-symbols-outlined">
visibility
</span>
                        </a>
                        
                        @if(auth()->guard('admin')->user()->hasPermissionTo('delete-permissions'))
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$permission->id.")"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'permission-delete-form'])
