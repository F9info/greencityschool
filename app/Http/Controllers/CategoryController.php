<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Models\Category;
use Flash;

class CategoryController extends AppBaseController
{
    /** @var CategoryRepository $categoryRepository*/
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
        
        $this->middleware(['admin_permissions:add-developer-settings-categories'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-developer-settings-categories'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-developer-settings-categories'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-developer-settings-categories'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Category.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if (!empty($request->search)) {
            $query->where('name', 'LIKE', '%' . $request->search . "%");
        }

        $categories = $query->latest()->paginate(10);

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('Category added successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }
        if ($category->settings->count() > 0) {
            Flash::error('Unable to delete becuase some application settings assigned to this category.');
        } else {
            $this->categoryRepository->delete($id);
            Flash::success('Category deleted successfully.');
        }

        return redirect(route('categories.index'));
    }
}
