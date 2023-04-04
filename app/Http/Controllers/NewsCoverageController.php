<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsCoverageRequest;
use App\Http\Requests\UpdateNewsCoverageRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\NewsCoverageRepository;
use Illuminate\Http\Request;
use App\Models\NewsCoverage;
use App\Models\NewsCoverageCategory;
use Flash;

class NewsCoverageController extends AppBaseController
{
    /** @var NewsCoverageRepository $newsCoverageRepository*/
    private $newsCoverageRepository;

    public function __construct(NewsCoverageRepository $newsCoverageRepo)
    {
        $this->newsCoverageRepository = $newsCoverageRepo;

        $this->middleware(['admin_permissions:add-news-coverage'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-news-coverage'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-news-coverage'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-news-coverage'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the NewsCoverage.
     */
    public function index(Request $request)
    {
        $categories = NewsCoverageCategory::orderBy('position', 'asc')->get();
        $query = NewsCoverage::query();

        if (!empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . "%");
        }
        if (!empty($request->category)) {
            $query->where('news_coverage_category_id', $request->category);
        }
        $newsCoverages = $query->sortable(['position', 'asc'])->paginate(10);


        return view('news_coverages.index', compact('newsCoverages', 'categories'));
    }

    /**
     * Show the form for creating a new NewsCoverage.
     */
    public function create()
    {
        $categories = NewsCoverageCategory::all()->pluck('name', 'id');
        return view('news_coverages.create', compact('categories'));
    }

    /**
     * Store a newly created NewsCoverage in storage.
     */
    public function store(CreateNewsCoverageRequest $request)
    {
        $input = $request->all();

        $newsCoverage = $this->newsCoverageRepository->create($input);

        Flash::success('News Coverage added successfully.');

        return redirect(route('newsCoverages.index'));
    }

    /**
     * Display the specified NewsCoverage.
     */
    public function show($id)
    {
        $newsCoverage = $this->newsCoverageRepository->find($id);

        if (empty($newsCoverage)) {
            Flash::error('News Coverage not found');

            return redirect(route('newsCoverages.index'));
        }

        return view('news_coverages.show')->with('newsCoverage', $newsCoverage);
    }

    /**
     * Show the form for editing the specified NewsCoverage.
     */
    public function edit($id)
    {
        $categories = NewsCoverageCategory::all()->pluck('name', 'id');
        $newsCoverage = $this->newsCoverageRepository->find($id);

        if (empty($newsCoverage)) {
            Flash::error('News Coverage not found');

            return redirect(route('newsCoverages.index'));
        }

        return view('news_coverages.edit', compact('newsCoverage', 'categories'));
    }

    /**
     * Update the specified NewsCoverage in storage.
     */
    public function update($id, UpdateNewsCoverageRequest $request)
    {
        $newsCoverage = $this->newsCoverageRepository->find($id);

        if (empty($newsCoverage)) {
            Flash::error('News Coverage not found');

            return redirect(route('newsCoverages.index'));
        }

        $newsCoverage = $this->newsCoverageRepository->update($request->all(), $id);

        Flash::success('News Coverage updated successfully.');

        return redirect(route('newsCoverages.index'));
    }

    /**
     * Remove the specified NewsCoverage from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $newsCoverage = $this->newsCoverageRepository->find($id);

        if (empty($newsCoverage)) {
            Flash::error('News Coverage not found');

            return redirect(route('newsCoverages.index'));
        }

        $this->newsCoverageRepository->delete($id);

        Flash::success('News Coverage deleted successfully.');

        return redirect(route('newsCoverages.index'));
    }

    public function sort(Request $request)
    {
        $newsCoverages = $this->newsCoverageRepository->all();

        foreach ($newsCoverages as $newsCoverage) {
            foreach ($request->order as $order) {
                if ($order['id'] == $newsCoverage->id) {
                    $newsCoverage->position = $order['position'];
                    $newsCoverage->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}