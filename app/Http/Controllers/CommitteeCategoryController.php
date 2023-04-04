<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommitteeCategoryRequest;
use App\Http\Requests\UpdateCommitteeCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CommitteeCategory;
use App\Models\CommitteeCategoryType;
use App\Repositories\CommitteeCategoryRepository;
use Doctrine\DBAL\Types\Types;
use Illuminate\Http\Request;
use Flash;

class CommitteeCategoryController extends AppBaseController
{
    /** @var CommitteeCategoryRepository $committeeCategoryRepository*/
    private $committeeCategoryRepository;

    public function __construct(CommitteeCategoryRepository $committeeCategoryRepo)
    {
        $this->committeeCategoryRepository = $committeeCategoryRepo;
        
        $this->middleware(['admin_permissions:add-committee-categories'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-committee-categories'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-committee-categories'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-committee-categories'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the CommitteeCategory.
     */
    public function index(Request $request)
    {
        $types = CommitteeCategoryType::all();

        $query = committeeCategory::query();
        if (!empty($request->search)) {
            $query->where('name', 'LIKE', '%' . $request->search . "%");
        }
        if (!empty($request->type)) {
            $query->where('committee_category_type_id', $request->type);
        }
        $committeeCategories = $query->sortable(['position', 'asc'])->paginate(10);

        return view('committee_categories.index', compact('committeeCategories', 'types'));
    }

    /**
     * Show the form for creating a new CommitteeCategory.
     */
    public function create()
    {
        $types = CommitteeCategoryType::all()->pluck('type', 'id');
        return view('committee_categories.create', compact('types'));
    }

    /**
     * Store a newly created CommitteeCategory in storage.
     */
    public function store(CreateCommitteeCategoryRequest $request)
    {
        $input = $request->all();

        $committeeCategory = $this->committeeCategoryRepository->create($input);

        Flash::success('Committee Category addded successfully.');

        return redirect(route('committeeCategories.index'));
    }

    /**
     * Display the specified CommitteeCategory.
     */
    public function show($id)
    {
        $committeeCategory = $this->committeeCategoryRepository->find($id);

        if (empty($committeeCategory)) {
            Flash::error('Committee Category not found');

            return redirect(route('committeeCategories.index'));
        }

        return view('committee_categories.show')->with('committeeCategory', $committeeCategory);
    }

    /**
     * Show the form for editing the specified CommitteeCategory.
     */
    public function edit($id)
    {
        $types = CommitteeCategoryType::all()->pluck('type', 'id');
        $committeeCategory = $this->committeeCategoryRepository->find($id);

        if (empty($committeeCategory)) {
            Flash::error('Committee Category not found');

            return redirect(route('committeeCategories.index'));
        }

        return view('committee_categories.edit', compact('committeeCategory', 'types'));
    }

    /**
     * Update the specified CommitteeCategory in storage.
     */
    public function update($id, UpdateCommitteeCategoryRequest $request)
    {
        $committeeCategory = $this->committeeCategoryRepository->find($id);

        if (empty($committeeCategory)) {
            Flash::error('Committee Category not found');

            return redirect(route('committeeCategories.index'));
        }

        $committeeCategory = $this->committeeCategoryRepository->update($request->all(), $id);

        Flash::success('Committee Category updated successfully.');

        return redirect(route('committeeCategories.index'));
    }

    /**
     * Remove the specified CommitteeCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $committeeCategory = $this->committeeCategoryRepository->find($id);

        if (empty($committeeCategory)) {
            Flash::error('Committee Category not found');

            return redirect(route('committeeCategories.index'));
        }

        if ($committeeCategory->committeeMembers->count() > 0) {
            Flash::error('Unable to delete this Committee Category. Please delete assigned committee member first.');
        } else {
            $this->committeeCategoryRepository->delete($id);
            Flash::success('Committee Category deleted successfully.');
        }

        return redirect(route('committeeCategories.index'));
    }

    public function sort(Request $request)
    {
        $committeeCategories = $this->committeeCategoryRepository->all();

        foreach ($committeeCategories as $committeeCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $committeeCategory->id) {
                    $committeeCategory->position = $order['position'];
                    $committeeCategory->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
