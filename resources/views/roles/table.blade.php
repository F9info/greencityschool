<div class="table-responsive">
    <table class="table" id="roles-table">
        <thead>
            <tr>
                <th>Sl no.</th>
                <th>Name</th>
                <th style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $roles->firstItem() + $key }}</td>
                    <td>{!! $role->name !!}</td>
                    <td style="text-align:center">
                        {!! Form::open([
                            'route' => ['roles.destroy', $role->id],
                            'method' => 'delete',
                            'id' => 'role-delete-form' . $role->id,
                        ]) !!}
                        <div class='btn-group'>
                            <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-default btn-xs'>
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </a>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-roles'))
                            <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-default btn-xs'>
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-roles'))
                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => 'deleteRecord(event, ' . $role->id . ')',
                            ]) !!}
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'role-delete-form'])
