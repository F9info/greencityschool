<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceCategoryRequest;
use App\Http\Requests\UpdateServiceCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ServiceCategoryRepository;
use Illuminate\Http\Request;
use Flash;

class ServiceCategoryController extends AppBaseController
{
    /** @var ServiceCategoryRepository $serviceCategoryRepository*/
    private $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepo)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepo;
    }

    /**
     * Display a listing of the ServiceCategory.
     */
    public function index(Request $request)
    {
        $serviceCategories = $this->serviceCategoryRepository->paginate(10);

        return view('service_categories.index')
            ->with('serviceCategories', $serviceCategories);
    }

    /**
     * Show the form for creating a new ServiceCategory.
     */
    public function create()
    {
        return view('service_categories.create');
    }

    /**
     * Store a newly created ServiceCategory in storage.
     */
    public function store(CreateServiceCategoryRequest $request)
    {
        $input = $request->all();

        $serviceCategory = $this->serviceCategoryRepository->create($input);
        if ($request->hasfile('image')) {
            $serviceCategory->image = uploadImage($request->file('image'), 'images/services/', null, null);
        }
        $serviceCategory->save();

        Flash::success('Service Category saved successfully.');

        return redirect(route('serviceCategories.index'));
    }

    /**
     * Display the specified ServiceCategory.
     */
    public function show($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        return view('service_categories.show')->with('serviceCategory', $serviceCategory);
    }

    /**
     * Show the form for editing the specified ServiceCategory.
     */
    public function edit($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        return view('service_categories.edit')->with('serviceCategory', $serviceCategory);
    }

    /**
     * Update the specified ServiceCategory in storage.
     */
    public function update($id, UpdateServiceCategoryRequest $request)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        if ($request->hasfile('image')) {
            removeImage($serviceCategory->image, 'images/services/');
        }
        $serviceCategory = $this->serviceCategoryRepository->update($request->all(), $id);
        if ($request->hasfile('image')) {
            $serviceCategory->image = uploadImage($request->file('image'), 'images/services/', null, null);
        }
        $serviceCategory->save();

        Flash::success('Service Category updated successfully.');

        return redirect(route('serviceCategories.index'));
    }

    /**
     * Remove the specified ServiceCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        if ($serviceCategory->image != null) {
            removeImage($serviceCategory->image, 'images/services/');
        }
        $this->serviceCategoryRepository->delete($id);

        Flash::success('Service Category deleted successfully.');

        return redirect(route('serviceCategories.index'));
    }
}
