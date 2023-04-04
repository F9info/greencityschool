<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberInterestRequest;
use App\Http\Requests\UpdateMemberInterestRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\MemberInterest;
use App\Models\PersonalDetails;
use App\Repositories\MemberInterestRepository;
use Illuminate\Http\Request;
use Flash;

class MemberInterestController extends AppBaseController
{
    /** @var MemberInterestRepository $memberInterestRepository*/
    private $memberInterestRepository;

    public function __construct(MemberInterestRepository $memberInterestRepo)
    {
        $this->memberInterestRepository = $memberInterestRepo;
        
        $this->middleware(['admin_permissions:add-membership-interests'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-membership-interests'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-membership-interests'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-membership-interests'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the MemberInterest.
     */
    public function index(Request $request)
    {

        $query = MemberInterest::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('interests', 'LIKE', '%' . $search . "%");
            });
        }
        $memberInterests = $query->sortable(['position', 'asc'])->paginate(10);

        return view('member_interests.index')
            ->with('memberInterests', $memberInterests);
    }

    /**
     * Show the form for creating a new MemberInterest.
     */
    public function create()
    {
        return view('member_interests.create');
    }

    /**
     * Store a newly created MemberInterest in storage.
     */
    public function store(CreateMemberInterestRequest $request)
    {
        $input = $request->all();

        $memberInterest = $this->memberInterestRepository->create($input);

        Flash::success('Member Interest added successfully.');

        return redirect(route('memberInterests.index'));
    }

    /**
     * Display the specified MemberInterest.
     */
    public function show($id)
    {
        $memberInterest = $this->memberInterestRepository->find($id);

        if (empty($memberInterest)) {
            Flash::error('Member Interest not found');

            return redirect(route('memberInterests.index'));
        }

        return view('member_interests.show')->with('memberInterest', $memberInterest);
    }

    /**
     * Show the form for editing the specified MemberInterest.
     */
    public function edit($id)
    {
        $memberInterest = $this->memberInterestRepository->find($id);

        if (empty($memberInterest)) {
            Flash::error('Member Interest not found');

            return redirect(route('memberInterests.index'));
        }

        return view('member_interests.edit')->with('memberInterest', $memberInterest);
    }

    /**
     * Update the specified MemberInterest in storage.
     */
    public function update($id, UpdateMemberInterestRequest $request)
    {
        $memberInterest = $this->memberInterestRepository->find($id);

        if (empty($memberInterest)) {
            Flash::error('Member Interest not found');

            return redirect(route('memberInterests.index'));
        }

        $memberInterest = $this->memberInterestRepository->update($request->all(), $id);

        Flash::success('Member Interest updated successfully.');

        return redirect(route('memberInterests.index'));
    }

    /**
     * Remove the specified MemberInterest from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $memberInterest = $this->memberInterestRepository->find($id);

        if (empty($memberInterest)) {
            Flash::error('Member Interest not found');

            return redirect(route('memberInterests.index'));
        }
        $memberInterests = PersonalDetails::where('member_interests', 'LIKE', '%"'.$memberInterest->id.'"%')->count();
        $spouseInterests = PersonalDetails::where('spouse_interests', 'LIKE', '%"'.$memberInterest->id.'"%')->count();
        $childInterests = PersonalDetails::where('child_interests', 'LIKE', '%"'.$memberInterest->id.'"%')->count();

        if($memberInterests > 0 || $spouseInterests > 0 || $childInterests > 0){
            Flash::error('Unable to delete this Membership Interest. Please delete assigned Personal Details first.');
        }else{
            $this->memberInterestRepository->delete($id);
            Flash::success('Member Interest deleted successfully.');
        }

        return redirect(route('memberInterests.index'));
    }

    public function sort(Request $request)
    {
        $memberInterests = $this->memberInterestRepository->all();

        foreach ($memberInterests as $memberInterest) {
            foreach ($request->order as $order) {
                if ($order['id'] == $memberInterest->id) {
                    $memberInterest->position = $order['position'];
                    $memberInterest->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
