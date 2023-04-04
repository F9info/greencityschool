<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Flash;
use Hash;

class PermissionController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware(['admin_permissions:add-permissions'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-permissions'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-permissions'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-permissions'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $permissions = Permission::where('type', 1)->paginate(10);

        return view('permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     */
    public function store(Request $request)
    {
        $check = Permission::where('name', $request->name)->first();
        if ($check == NULL) {
            Permission::create(['guard_name' => 'admin', 'name' => $request->name, 'type' => 1]);
            Permission::create(['guard_name' => 'admin', 'name' => 'add-' . $request->name]);
            Permission::create(['guard_name' => 'admin', 'name' => 'edit-' . $request->name]);
            Permission::create(['guard_name' => 'admin', 'name' => 'delete-' . $request->name]);
            Permission::create(['guard_name' => 'admin', 'name' => 'view-' . $request->name]);
            Permission::create(['guard_name' => 'admin', 'name' => 'publish-' . $request->name]);

            Flash::success('Permission added successfully.');
            return redirect(route('permissions.index'));
        } else {
            Flash::error('Permission already exists.');
            return redirect(route('permissions.create'));
        }
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     */
    public function show(Permission $permission)
    {
        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     */
    public function edit(Permission $permission)
    {
        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     */
    public function update(Permission $permission, Request $request)
    {
        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }
        $permission->update(['name' => $request->name]);

        Flash::success('Permission updated successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        $permissionAdd = Permission::where('name', '=', 'add-' . $permission->name)->first();
        $permissionEdit = Permission::where('name', '=', 'edit-' . $permission->name)->first();
        $permissionDelete = Permission::where('name', '=', 'delete-' . $permission->name)->first();
        $permissionView = Permission::where('name', '=', 'view-' . $permission->name)->first();
        $permissionPublish = Permission::where('name', '=', 'publish-' . $permission->name)->first();

        if ($permissionAdd->roles->count() > 0 || $permissionEdit->roles->count() > 0 || $permissionDelete->roles->count() > 0 || $permissionView->roles->count() > 0 || $permissionPublish->roles->count() > 0) {
            Flash::error('Unable to delete becuase some roles assigned to this permission.');
        } else {
            $permissionAdd->delete();
            $permissionEdit->delete();
            $permissionDelete->delete();
            $permissionView->delete();
            $permissionPublish->delete();
            $permission->delete();
            Flash::success('Permission deleted successfully.');
        }

        return redirect(route('permissions.index'));
    }
}
