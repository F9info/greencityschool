<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Flash;
use Hash;

class RoleController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware(['admin_permissions:add-roles'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-roles'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-roles'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-roles'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $roles = Role::paginate(10);

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        $permissions = Permission::where('type', 1)->get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     */
    public function store(Request $request)
    {
        $check = Role::where('name', $request->name)->first();
        if ($check == NULL) {
            $role = Role::create(['guard_name' => 'admin', 'name' => $request->name]);

            $permissions = Permission::where('type', 1)->get();
            foreach ($permissions as $permission) {
                if ($request->has('add-' . $permission->name)) {
                    $role->givePermissionTo('add-' . $permission->name);
                }
                if ($request->has('edit-' . $permission->name)) {
                    $role->givePermissionTo('edit-' . $permission->name);
                }
                if ($request->has('delete-' . $permission->name)) {
                    $role->givePermissionTo('delete-' . $permission->name);
                }
                if ($request->has('view-' . $permission->name)) {
                    $role->givePermissionTo('view-' . $permission->name);
                }
                if ($request->has('publish-' . $permission->name)) {
                    $role->givePermissionTo('publish-' . $permission->name);
                }
            }

            Flash::success('Role saved successfully.');

            return redirect(route('roles.index'));
        } else {
            Flash::error('Role already exists.');
            return redirect(route('roles.create'));
        }
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     */
    public function show(Role $role)
    {
        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     */
    public function edit(Role $role)
    {
        $permissions = Permission::where('type', 1)->get();
        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     */
    public function update(Role $role, Request $request)
    {
        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }
        $role->update(['name' => $request->name]);

        $permissions = Permission::where('type', 1)->get();
        foreach ($permissions as $permission) {
            $request->has('add-' . $permission->name) ? $role->givePermissionTo('add-' . $permission->name) : $role->revokePermissionTo('add-' . $permission->name);
            $request->has('edit-' . $permission->name) ? $role->givePermissionTo('edit-' . $permission->name) : $role->revokePermissionTo('edit-' . $permission->name);
            $request->has('delete-' . $permission->name) ? $role->givePermissionTo('delete-' . $permission->name) : $role->revokePermissionTo('delete-' . $permission->name);
            $request->has('view-' . $permission->name) ? $role->givePermissionTo('view-' . $permission->name) : $role->revokePermissionTo('view-' . $permission->name);
            $request->has('publish-' . $permission->name) ? $role->givePermissionTo('publish-' . $permission->name) : $role->revokePermissionTo('publish-' . $permission->name);
        }

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        if ($role->users->count() > 0) {
            Flash::error('Unable to delete becuase some users assigned to this role.');
        } else {
            $role->delete();
            Flash::success('Role deleted successfully.');
        }

        return redirect(route('roles.index'));
    }
}
