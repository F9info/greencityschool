<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsCoverageCategoryRequest;
use App\Http\Requests\UpdateNewsCoverageCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\NewsCoverageCategoryRepository;
use Illuminate\Http\Request;
use App\Models\NewsCoverageCategory;
use Flash;

class NewsCoverageCategoryController extends AppBaseController
{
    /** @var NewsCoverageCategoryRepository $newsCoverageCategoryRepository*/
    private $newsCoverageCategoryRepository;

    public function __construct(NewsCoverageCategoryRepository $newsCoverageCategoryRepo)
    {
        $this->newsCoverageCategoryRepository = $newsCoverageCategoryRepo;

        $this->middleware(['admin_permissions:add-news-coverage-categories'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-news-coverage-categories'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-news-coverage-categories'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-news-coverage-categories'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the NewsCoverageCategory.
     */
    public function index(Request $request)
    {

        $query = NewsCoverageCategory::query();
        if (!empty($request->search)) {
            $query->where('name', 'LIKE', '%' . $request->search . "%")
                ->orwhere('year', 'LIKE', '%' . $request->search . "%");
        }
        $newsCoverageCategories = $query->sortable(['created_at' => 'desc'])->paginate(10);

        return view('news_coverage_categories.index')
            ->with('newsCoverageCategories', $newsCoverageCategories);
    }

    /**
     * Show the form for creating a new NewsCoverageCategory.
     */
    public function create()
    {
        return view('news_coverage_categories.create');
    }

    /**
     * Store a newly created NewsCoverageCategory in storage.
     */
    public function store(CreateNewsCoverageCategoryRequest $request)
    {
        $input = $request->all();

        $newsCoverageCategory = $this->newsCoverageCategoryRepository->create($input);

        Flash::success('News Coverage Category added successfully.');

        return redirect(route('newsCoverageCategories.index'));
    }

    /**
     * Display the specified NewsCoverageCategory.
     */
    public function show($id)
    {
        $newsCoverageCategory = $this->newsCoverageCategoryRepository->find($id);

        if (empty($newsCoverageCategory)) {
            Flash::error('News Coverage Category not found');

            return redirect(route('newsCoverageCategories.index'));
        }

        return view('news_coverage_categories.show')->with('newsCoverageCategory', $newsCoverageCategory);
    }

    /**
     * Show the form for editing the specified NewsCoverageCategory.
     */
    public function edit($id)
    {
        $newsCoverageCategory = $this->newsCoverageCategoryRepository->find($id);

        if (empty($newsCoverageCategory)) {
            Flash::error('News Coverage Category not found');

            return redirect(route('newsCoverageCategories.index'));
        }

        return view('news_coverage_categories.edit')->with('newsCoverageCategory', $newsCoverageCategory);
    }

    /**
     * Update the specified NewsCoverageCategory in storage.
     */
    public function update($id, UpdateNewsCoverageCategoryRequest $request)
    {
        $newsCoverageCategory = $this->newsCoverageCategoryRepository->find($id);

        if (empty($newsCoverageCategory)) {
            Flash::error('News Coverage Category not found');

            return redirect(route('newsCoverageCategories.index'));
        }

        $newsCoverageCategory = $this->newsCoverageCategoryRepository->update($request->all(), $id);

        Flash::success('News Coverage Category updated successfully.');

        return redirect(route('newsCoverageCategories.index'));
    }

    /**
     * Remove the specified NewsCoverageCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $newsCoverageCategory = $this->newsCoverageCategoryRepository->find($id);

        if (empty($newsCoverageCategory)) {
            Flash::error('News Coverage Category not found');

            return redirect(route('newsCoverageCategories.index'));
        }

        if ($newsCoverageCategory->newsCoverages->count() > 0) {
            Flash::error('Unable to delete this News Coverage Category. Please delete assigned News Coverage first.');
        } else {
            $this->newsCoverageCategoryRepository->delete($id);
            Flash::success('News Coverage Category deleted successfully.');
        }

        return redirect(route('newsCoverageCategories.index'));
    }

    public function sort(Request $request)
    {
        $newsCoverageCategories = $this->newsCoverageCategoryRepository->all();

        foreach ($newsCoverageCategories as $newsCoverageCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $newsCoverageCategory->id) {
                    $newsCoverageCategory->position = $order['position'];
                    $newsCoverageCategory->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
