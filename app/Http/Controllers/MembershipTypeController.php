<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMembershipTypeRequest;
use App\Http\Requests\UpdateMembershipTypeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MembershipTypeRepository;
use Illuminate\Http\Request;
use App\Models\MembershipType;
use Flash;

class MembershipTypeController extends AppBaseController
{
    /** @var MembershipTypeRepository $membershipTypeRepository*/
    private $membershipTypeRepository;

    public function __construct(MembershipTypeRepository $membershipTypeRepo)
    {
        $this->membershipTypeRepository = $membershipTypeRepo;
        
        $this->middleware(['admin_permissions:add-membership-types'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-membership-types'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-membership-types'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-membership-types'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the MembershipType.
     */
    public function index(Request $request)
    {
        $query = MembershipType::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('membership_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('price', 'LIKE', '%' . $search . "%");
            });
        }
        $membershipTypes = $query->sortable(['position', 'asc'])->paginate(10);

        return view('membership_types.index')
            ->with('membershipTypes', $membershipTypes);
    }

    /**
     * Show the form for creating a new MembershipType.
     */
    public function create()
    {
        return view('membership_types.create');
    }

    /**
     * Store a newly created MembershipType in storage.
     */
    public function store(CreateMembershipTypeRequest $request)
    {
        $membershipType = new MembershipType();
        $membershipType->membership_name = $request->membership_name;
        $membershipType->price = $request->price;
        $membershipType->validity_type = $request->validity_type;
        if ($request->validity_type == 'months') {
            $membershipType->months = $request->months;
        }
        if ($request->validity_type == 'lifetime') {
            $membershipType->lifetime = 1;
        }
        if ($request->validity_type == 'expirydate') {
            $membershipType->expiry_date = $request->expiry_date;
        }
        $membershipType->save();

        Flash::success('Membership Type added successfully.');

        return redirect(route('membershipTypes.index'));
    }

    /**
     * Display the specified MembershipType.
     */
    public function show($id)
    {
        $membershipType = $this->membershipTypeRepository->find($id);

        if (empty($membershipType)) {
            Flash::error('Membership Type not found');

            return redirect(route('membershipTypes.index'));
        }

        return view('membership_types.show')->with('membershipType', $membershipType);
    }

    /**
     * Show the form for editing the specified MembershipType.
     */
    public function edit($id)
    {
        $membershipType = $this->membershipTypeRepository->find($id);

        if (empty($membershipType)) {
            Flash::error('Membership Type not found');

            return redirect(route('membershipTypes.index'));
        }

        return view('membership_types.edit')->with('membershipType', $membershipType);
    }

    /**
     * Update the specified MembershipType in storage.
     */
    public function update($id, UpdateMembershipTypeRequest $request)
    {
        $membershipType = $this->membershipTypeRepository->find($id);

        if (empty($membershipType)) {
            Flash::error('Membership Type not found');

            return redirect(route('membershipTypes.index'));
        }

        $membershipType->membership_name = $request->membership_name;
        $membershipType->price = $request->price;
        $membershipType->validity_type = $request->validity_type;
        if ($request->validity_type == 'months') {
            $membershipType->months = $request->months;
            $membershipType->expiry_date = null;
            $membershipType->lifetime = 0;
        }
        if ($request->validity_type == 'lifetime') {
            $membershipType->lifetime = 1;
            $membershipType->months = null;
            $membershipType->expiry_date = null;
        }
        if ($request->validity_type == 'expirydate') {
            $membershipType->expiry_date = $request->expiry_date;
            $membershipType->months = null;
            $membershipType->lifetime = 0;
        }
        $membershipType->save();

        Flash::success('Membership Type updated successfully.');

        return redirect(route('membershipTypes.index'));
    }

    /**
     * Remove the specified MembershipType from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $membershipType = $this->membershipTypeRepository->find($id);

        if (empty($membershipType)) {
            Flash::error('Membership Type not found');

            return redirect(route('membershipTypes.index'));
        }
        if($membershipType->personalDetails->count() > 0){
            Flash::error('Unable to delete this Membership Type. Please delete assigned Members first.');
        }else{
            $this->membershipTypeRepository->delete($id);
            Flash::success('Membership Type deleted successfully.');
        }

        return redirect(route('membershipTypes.index'));
    }

    public function sort(Request $request)
    {
        $membershipTypes = $this->membershipTypeRepository->all();

        foreach ($membershipTypes as $membershipType) {
            foreach ($request->order as $order) {
                if ($order['id'] == $membershipType->id) {
                    $membershipType->position = $order['position'];
                    $membershipType->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
