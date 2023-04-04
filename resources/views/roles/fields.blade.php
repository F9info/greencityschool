<!-- Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('name', null, ['class' => 'form-control letters-input',  'required']) !!}
    {!! Form::label('name', 'Name', ['class' => 'span_required']) !!}

</div>
<div class="col-sm-12 clear" ></div>
<h3>Assign Permissions</h3>
<div class="table-responsive">
<table class="table table-hover">
    <thead>

        <tr>
            <th>Permission</th>
            <th>Add</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>View</th>
            <th>Publish</th>

        </tr>
    </thead>

    <tbody>
        @foreach($permissions as $permission)
        <tr>
            <td>{{ $permission->name }}</td>
            <td>
                <div class="icheck-primary">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch{{ $permission->id }}"
                            name="add-{{ $permission->name }}"
                            {{ isset($role) ? ($role->hasPermissionTo('add-'.$permission->name) ? 'checked' : '') : '' }}>
                        <label class="custom-control-label" for="customSwitch{{ $permission->id }}">&nbsp;</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="icheck-primary">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch{{ $permission->id }}a"
                            name="edit-{{ $permission->name }}"
                            {{ isset($role) ? ($role->hasPermissionTo('edit-'.$permission->name) ? 'checked' : '') : '' }}>
                        <label class="custom-control-label" for="customSwitch{{ $permission->id }}a">&nbsp;</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="icheck-primary">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch{{ $permission->id }}b"
                            name="delete-{{ $permission->name }}"
                            {{ isset($role) ? ($role->hasPermissionTo('delete-'.$permission->name) ? 'checked' : '') : '' }}>
                        <label class="custom-control-label" for="customSwitch{{ $permission->id }}b">&nbsp;</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="icheck-primary">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch{{ $permission->id }}c"
                            name="view-{{ $permission->name }}"
                            {{ isset($role) ? ($role->hasPermissionTo('view-'.$permission->name) ? 'checked' : '') : '' }}>
                        <label class="custom-control-label" for="customSwitch{{ $permission->id }}c">&nbsp;</label>
                    </div>
                </div>
            </td>
            <td>
                <div class="icheck-primary">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch{{ $permission->id }}d"
                            name="publish-{{ $permission->name }}"
                            {{ isset($role) ? ($role->hasPermissionTo('publish-'.$permission->name) ? 'checked' : '') : '' }}>
                        <label class="custom-control-label" for="customSwitch{{ $permission->id }}d">&nbsp;</label>
                    </div>
                </div>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
@push('page_scripts')
    <script type="text/javascript">
        $('.icheck-primary').click(function(){
    if ( $(this).is(":checked") ) {
        $(this).addClass("active");
        toggleColor();
        console.log('ON');
    } else {
        $(this).removeClass("active");
        removeColor();
        console.log('OFF');
    }
});
    </script>
@endpush
