<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use App\Models\CommitteeMember;
use App\Models\CommitteeCategory;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CommitteeMemberRepository;
use App\Http\Requests\CreateCommitteeMemberRequest;
use App\Http\Requests\UpdateCommitteeMemberRequest;
use App\Models\CommitteeMemberActiveList;
use DB;

class CommitteeMemberController extends AppBaseController
{
    /** @var CommitteeMemberRepository $committeeMemberRepository*/
    private $committeeMemberRepository;

    public function __construct(CommitteeMemberRepository $committeeMemberRepo)
    {
        $this->committeeMemberRepository = $committeeMemberRepo;
        
        $this->middleware(['admin_permissions:add-committee-members'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-committee-members'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-committee-members'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-committee-members'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the CommitteeMember.
     */
    public function index(Request $request)
    {
        $committeeCategories = CommitteeCategory::all();

        $query = DB::table('committee_members');
        $query->select('committee_members.*');
        if (!empty($request->committee_category)) {
            $query->join('committee_member_active_lists', 'committee_member_active_lists.committee_member_id', '=', 'committee_members.id');
            $query->join('committee_categories', 'committee_categories.id', '=', 'committee_member_active_lists.committee_category_id');
            $query->where('committee_member_active_lists.committee_category_id', $request->committee_category);
        }
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('committee_members.name', 'LIKE', '%' . $search . "%")
                    ->orwhere('committee_members.email', 'LIKE', '%' . $search . "%")
                    ->orwhere('committee_members.phone', 'LIKE', '%' . $search . "%")
                    ->orwhere('committee_members.gender', 'LIKE', '%' . $search . "%")
                    ->orwhere('committee_members.city', 'LIKE', '%' . $search . "%")
                    ->orwhere('committee_members.state', 'LIKE', '%' . $search . "%");
            });
        }
        $sort = $request->sort ?? 'committee_members.position';
        $direction = $request->direction ?? 'asc';

        $committeeMembers = $query->orderBy($sort, $direction)->paginate(30);

        return view('committee_members.index', compact('committeeCategories', 'committeeMembers'));
    }

    /**
     * Show the form for creating a new CommitteeMember.
     */
    public function create()
    {
        $committeeCategories = CommitteeCategory::orderBy('position', 'asc')->get();
        return view('committee_members.create', compact('committeeCategories'));
    }

    /**
     * Store a newly created CommitteeMember in storage.
     */
    public function store(CreateCommitteeMemberRequest $request)
    {
        $input = $request->all();
        $committeeMember = $this->committeeMemberRepository->create($input);
        if ($request->hasfile('member_photo')) {
            $committeeMember->member_photo = uploadImage($request->file('member_photo'), 'images/committee-members/', null, null);
        }
        $committeeMember->save();

        if ($request->committeeCategories != '') {
            foreach ($request->committeeCategories as $committeeCategory) {
                $committeeActiveList = new CommitteeMemberActiveList();
                $committeeActiveList->committee_category_id = $committeeCategory;
                $committeeActiveList->committee_member_id = $committeeMember->id;
                $status = 'status' . $committeeCategory;
                $committeeActiveList->active = $request->$status;
                $committeeActiveList->save();
            }
        }

        Flash::success('Committee Member saved successfully.');

        return redirect(route('committeeMembers.index'));
    }

    /**
     * Display the specified CommitteeMember.
     */
    public function show($id)
    {
        $committeeMember = $this->committeeMemberRepository->find($id);

        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }

        return view('committee_members.show')->with('committeeMember', $committeeMember);
    }

    /**
     * Show the form for editing the specified CommitteeMember.
     */
    public function edit($id)
    {
        $committeeCategories = CommitteeCategory::orderBy('position', 'asc')->get();
        $committeeMember = $this->committeeMemberRepository->find($id);

        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }

        return view('committee_members.edit', compact('committeeCategories', 'committeeMember'));
    }

    /**
     * Update the specified CommitteeMember in storage.
     */
    public function update($id, UpdateCommitteeMemberRequest $request)
    {
        $committeeMember = $this->committeeMemberRepository->find($id);

        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }

        if ($request->hasfile('member_photo')) {
            removeImage($committeeMember->member_photo, 'images/committee-members/');
        }

        $committeeMember = $this->committeeMemberRepository->update($request->all(), $id);

        if ($request->hasfile('member_photo')) {
            $committeeMember->member_photo = uploadImage($request->file('member_photo'), 'images/committee-members/', null, null);
        }
        $committeeMember->save();

        if ($request->committeeCategories != '') {
            CommitteeMemberActiveList::where('committee_member_id', $id)->delete();
            foreach ($request->committeeCategories as $committeeCategory) {
                $committeeActiveList = new CommitteeMemberActiveList();
                $committeeActiveList->committee_category_id = $committeeCategory;
                $committeeActiveList->committee_member_id = $id;
                $status = 'status' . $committeeCategory;
                $committeeActiveList->active = $request->$status;
                $committeeActiveList->save();
            }
        }

        Flash::success('Committee Member updated successfully.');

        return redirect(route('committeeMembers.index'));
    }

    /**
     * Remove the specified CommitteeMember from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $committeeMember = $this->committeeMemberRepository->find($id);

        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }

        if ($committeeMember->member_photo != '') {
            removeImage($committeeMember->member_photo, 'images/committee-members/');
        }

        CommitteeMemberActiveList::where('committee_member_id', $id)->delete();

        $this->committeeMemberRepository->delete($id);

        Flash::success('Committee Member deleted successfully.');

        return redirect(route('committeeMembers.index'));
    }

    public function sort(Request $request)
    {
        $committeeMembers = $this->committeeMemberRepository->all();

        foreach ($committeeMembers as $committeeMember) {
            foreach ($request->order as $order) {
                if ($order['id'] == $committeeMember->id) {
                    $committeeMember->position = $order['position'];
                    $committeeMember->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}