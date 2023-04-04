<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use Flash;
use Hash;

class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware(['admin_permissions:add-admin-management'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-admin-management'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-admin-management'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-admin-management'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        if(auth()->guard('admin')->user()->roles->first()->name == "Developer Admin"){
            $roles = Role::all();
        }else{
            $roles = Role::where('name', '!=', 'Developer Admin')->get();
        }

        $query = Admin::query();

        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . "%")
                    ->orwhere('email', 'LIKE', '%' . $search . "%")
                    ->orwhere('mobile', 'LIKE', '%' . $search . "%")
                    ->orwhere('address', 'LIKE', '%' . $search . "%");
            });
        }

        $users = $query->sortable('created_at', 'desc')->paginate(10);

        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        if(auth()->guard('admin')->user()->roles->first()->name == "Developer Admin"){
            $roles = Role::all();
        }else{
            $roles = Role::where('name', '!=', 'Developer Admin')->get();
        }
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->userRepository->create($input);

        if ($request->role != '') {
            $user->assignRole($request->role);
        }
        Flash::success('User added successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     */
    public function edit($id)
    {
        if(auth()->guard('admin')->user()->roles->first()->name == "Developer Admin"){
            $roles = Role::all();
        }else{
            $roles = Role::where('name', '!=', 'Developer Admin')->get();
        }
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $input =  $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        $user = $this->userRepository->update($input, $id);
        $user->syncRoles($request->role);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    public function reset($id)
    {
        return view('users.reset')->with('id', $id);
    }

    public function resetPassword(Request $request)
    {
        $user = Admin::find($request->id);

        $user->password = Hash::make($request->password);
        $user->save();

        Flash::success('Password Updated Successfully.');
        return redirect('users');
    }
}
