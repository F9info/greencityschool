<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDonationCategoryRequest;
use App\Http\Requests\UpdateDonationCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DonationCategoryRepository;
use Illuminate\Http\Request;
use App\Models\DonationCategory;
use Flash;

class DonationCategoryController extends AppBaseController
{
    /** @var DonationCategoryRepository $donationCategoryRepository*/
    private $donationCategoryRepository;

    public function __construct(DonationCategoryRepository $donationCategoryRepo)
    {
        $this->donationCategoryRepository = $donationCategoryRepo;

        $this->middleware('admin_permissions:add-donation-categories', ['only' => ['create', 'store']]);
        $this->middleware('admin_permissions:edit-donation-categories', ['only' => ['edit', 'update']]);
        $this->middleware('admin_permissions:delete-donation-categories', ['only' => ['destroy']]);
        $this->middleware('admin_permissions:view-donation-categories', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the DonationCategory.
     */
    public function index(Request $request)
    {
        $query = DonationCategory::query();
        if (!empty($request->search)) {
            $query->where('donation_cause', 'LIKE', '%' . $request->search . "%");
        }
        $donationCategories = $query->sortable(['created_at' => 'desc'])->paginate(10);

        return view('donation_categories.index')
            ->with('donationCategories', $donationCategories);
    }

    /**
     * Show the form for creating a new DonationCategory.
     */
    public function create()
    {
        return view('donation_categories.create');
    }

    /**
     * Store a newly created DonationCategory in storage.
     */
    public function store(CreateDonationCategoryRequest $request)
    {
        $input = $request->all();

        $donationCategory = $this->donationCategoryRepository->create($input);

        Flash::success('Donation Category added successfully.');

        return redirect(route('donationCategories.index'));
    }

    /**
     * Display the specified DonationCategory.
     */
    public function show($id)
    {
        $donationCategory = $this->donationCategoryRepository->find($id);

        if (empty($donationCategory)) {
            Flash::error('Donation Category not found');

            return redirect(route('donationCategories.index'));
        }

        return view('donation_categories.show')->with('donationCategory', $donationCategory);
    }

    /**
     * Show the form for editing the specified DonationCategory.
     */
    public function edit($id)
    {
        $donationCategory = $this->donationCategoryRepository->find($id);

        if (empty($donationCategory)) {
            Flash::error('Donation Category not found');

            return redirect(route('donationCategories.index'));
        }

        return view('donation_categories.edit')->with('donationCategory', $donationCategory);
    }

    /**
     * Update the specified DonationCategory in storage.
     */
    public function update($id, UpdateDonationCategoryRequest $request)
    {
        $donationCategory = $this->donationCategoryRepository->find($id);

        if (empty($donationCategory)) {
            Flash::error('Donation Category not found');

            return redirect(route('donationCategories.index'));
        }

        $donationCategory = $this->donationCategoryRepository->update($request->all(), $id);

        Flash::success('Donation Category updated successfully.');

        return redirect(route('donationCategories.index'));
    }

    /**
     * Remove the specified DonationCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $donationCategory = $this->donationCategoryRepository->find($id);

        if (empty($donationCategory)) {
            Flash::error('Donation Category not found');

            return redirect(route('donationCategories.index'));
        }

        if($donationCategory->donations->count() > 0) {
            Flash::error('Unable to delete Donation Category. Please delete assigned donations first.');
        }else{
            $this->donationCategoryRepository->delete($id);
            Flash::success('Donation Category deleted successfully.');
        }

        return redirect(route('donationCategories.index'));
    }
}
