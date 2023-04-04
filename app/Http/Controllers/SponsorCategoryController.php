<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSponsorCategoryRequest;
use App\Http\Requests\UpdateSponsorCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SponsorCategoryRepository;
use Illuminate\Http\Request;
use App\Models\SponsorCategory;
use Flash;

class SponsorCategoryController extends AppBaseController
{
    /** @var SponsorCategoryRepository $sponsorCategoryRepository*/
    private $sponsorCategoryRepository;

    public function __construct(SponsorCategoryRepository $sponsorCategoryRepo)
    {
        $this->sponsorCategoryRepository = $sponsorCategoryRepo;
        
        $this->middleware(['admin_permissions:add-sponsor-categories'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-sponsor-categories'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-sponsor-categories'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-sponsor-categories'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the SponsorCategory.
     */
    public function index(Request $request)
    {
        $query = SponsorCategory::query();

        if (!empty($request->search)) {
            $query->where('category_name', 'LIKE', '%' . $request->search . "%");
        }
        $sponsorCategories = $query->sortable(['position', 'asc'])->paginate(10);

        return view('sponsor_categories.index')
            ->with('sponsorCategories', $sponsorCategories);
    }

    /**
     * Show the form for creating a new SponsorCategory.
     */
    public function create()
    {
        return view('sponsor_categories.create');
    }

    /**
     * Store a newly created SponsorCategory in storage.
     */
    public function store(CreateSponsorCategoryRequest $request)
    {
        $input = $request->all();

        $sponsorCategory = $this->sponsorCategoryRepository->create($input);

        Flash::success('Sponsor Category added successfully.');

        return redirect(route('sponsorCategories.index'));
    }

    /**
     * Display the specified SponsorCategory.
     */
    public function show($id)
    {
        $sponsorCategory = $this->sponsorCategoryRepository->find($id);

        if (empty($sponsorCategory)) {
            Flash::error('Sponsor Category not found');

            return redirect(route('sponsorCategories.index'));
        }

        return view('sponsor_categories.show')->with('sponsorCategory', $sponsorCategory);
    }

    /**
     * Show the form for editing the specified SponsorCategory.
     */
    public function edit($id)
    {
        $sponsorCategory = $this->sponsorCategoryRepository->find($id);

        if (empty($sponsorCategory)) {
            Flash::error('Sponsor Category not found');

            return redirect(route('sponsorCategories.index'));
        }

        return view('sponsor_categories.edit')->with('sponsorCategory', $sponsorCategory);
    }

    /**
     * Update the specified SponsorCategory in storage.
     */
    public function update($id, UpdateSponsorCategoryRequest $request)
    {
        $sponsorCategory = $this->sponsorCategoryRepository->find($id);

        if (empty($sponsorCategory)) {
            Flash::error('Sponsor Category not found');

            return redirect(route('sponsorCategories.index'));
        }

        $sponsorCategory = $this->sponsorCategoryRepository->update($request->all(), $id);

        Flash::success('Sponsor Category updated successfully.');

        return redirect(route('sponsorCategories.index'));
    }

    /**
     * Remove the specified SponsorCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sponsorCategory = $this->sponsorCategoryRepository->find($id);

        if (empty($sponsorCategory)) {
            Flash::error('Sponsor Category not found');

            return redirect(route('sponsorCategories.index'));
        }

        if($sponsorCategory->sponsors->count() > 0) {
            Flash::error('Unable to delete Sponsor Category. Please delete assigned Sponsors & Partners first.');
        }else{
            $this->sponsorCategoryRepository->delete($id);
            Flash::success('Sponsor Category deleted successfully.');
        }

        return redirect(route('sponsorCategories.index'));
    }

    public function sort(Request $request)
    {
        $sponsorCategories = $this->sponsorCategoryRepository->all();

        foreach ($sponsorCategories as $sponsorCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $sponsorCategory->id) {
                    $sponsorCategory->position = $order['position'];
                    $sponsorCategory->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
