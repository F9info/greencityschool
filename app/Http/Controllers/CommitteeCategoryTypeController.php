<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommitteeCategoryTypeRequest;
use App\Http\Requests\UpdateCommitteeCategoryTypeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CommitteeCategoryTypeRepository;
use Illuminate\Http\Request;
use App\Models\CommitteeCategoryType;
use Flash;

class CommitteeCategoryTypeController extends AppBaseController
{
    /** @var CommitteeCategoryTypeRepository $committeeCategoryTypeRepository*/
    private $committeeCategoryTypeRepository;

    public function __construct(CommitteeCategoryTypeRepository $committeeCategoryTypeRepo)
    {
        $this->committeeCategoryTypeRepository = $committeeCategoryTypeRepo;
        
        $this->middleware(['admin_permissions:add-committee-category-types'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-committee-category-types'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-committee-category-types'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-committee-category-types'])->only(['index', 'show']);
        $this->middleware('admin');

    }

    /**
     * Display a listing of the CommitteeCategoryType.
     */
    public function index(Request $request)
    {
        $query = committeeCategoryType::query();

        if (!empty($request->search)) {
            $query->where('type', 'LIKE', '%' . $request->search . "%");
        }

        $committeeCategoryTypes = $query->sortable(['created_at' => 'desc'])->paginate(10);

        return view('committee_category_types.index')
            ->with('committeeCategoryTypes', $committeeCategoryTypes);
    }

    /**
     * Show the form for creating a new CommitteeCategoryType.
     */
    public function create()
    {
        return view('committee_category_types.create');
    }

    /**
     * Store a newly created CommitteeCategoryType in storage.
     */
    public function store(CreateCommitteeCategoryTypeRequest $request)
    {
        $input = $request->all();

        $committeeCategoryType = $this->committeeCategoryTypeRepository->create($input);

        Flash::success('Committee Category Type added successfully.');

        return redirect(route('committeeCategoryTypes.index'));
    }

    /**
     * Display the specified CommitteeCategoryType.
     */
    public function show($id)
    {
        $committeeCategoryType = $this->committeeCategoryTypeRepository->find($id);

        if (empty($committeeCategoryType)) {
            Flash::error('Committee Category Type not found');

            return redirect(route('committeeCategoryTypes.index'));
        }

        return view('committee_category_types.show')->with('committeeCategoryType', $committeeCategoryType);
    }

    /**
     * Show the form for editing the specified CommitteeCategoryType.
     */
    public function edit($id)
    {
        $committeeCategoryType = $this->committeeCategoryTypeRepository->find($id);

        if (empty($committeeCategoryType)) {
            Flash::error('Committee Category Type not found');

            return redirect(route('committeeCategoryTypes.index'));
        }

        return view('committee_category_types.edit')->with('committeeCategoryType', $committeeCategoryType);
    }

    /**
     * Update the specified CommitteeCategoryType in storage.
     */
    public function update($id, UpdateCommitteeCategoryTypeRequest $request)
    {
        $committeeCategoryType = $this->committeeCategoryTypeRepository->find($id);

        if (empty($committeeCategoryType)) {
            Flash::error('Committee Category Type not found');

            return redirect(route('committeeCategoryTypes.index'));
        }

        $committeeCategoryType = $this->committeeCategoryTypeRepository->update($request->all(), $id);

        Flash::success('Committee Category Type updated successfully.');

        return redirect(route('committeeCategoryTypes.index'));
    }

    /**
     * Remove the specified CommitteeCategoryType from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $committeeCategoryType = $this->committeeCategoryTypeRepository->find($id);

        if (empty($committeeCategoryType)) {
            Flash::error('Committee Category Type not found');

            return redirect(route('committeeCategoryTypes.index'));
        }
        if ($committeeCategoryType->committeeCategories->count() > 0) {
            Flash::error('Unable to delete this committee category type. Please delete assigned committee categories first.');
        } else {
            $this->committeeCategoryTypeRepository->delete($id);
            Flash::success('Committee Category Type deleted successfully.');
        }

        return redirect(route('committeeCategoryTypes.index'));
    }
}
