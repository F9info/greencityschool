<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Models\News;
use Flash;

class NewsController extends AppBaseController
{
    /** @var NewsRepository $newsRepository*/
    private $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepository = $newsRepo;
        
        $this->middleware(['admin_permissions:add-news'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-news'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-news'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-news'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the News.
     */
    public function index(Request $request)
    {
        $query = News::query();

        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . "%")
                    ->orwhere('description', 'LIKE', '%' . $search . "%");
            });
        }
        $news = $query->sortable(['position', 'asc'])->paginate(10);

        return view('news.index')
            ->with('news', $news);
    }

    /**
     * Show the form for creating a new News.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created News in storage.
     */
    public function store(CreateNewsRequest $request)
    {
        $input = $request->all();

        $news = $this->newsRepository->create($input);
        if ($request->hasfile('image')) {
            $news->image = uploadImage($request->file('image'), 'images/news/', null, null);
        }
        $news->save();

        Flash::success('News added successfully.');

        return redirect(route('news.index'));
    }

    /**
     * Display the specified News.
     */
    public function show($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified News.
     */
    public function edit($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.edit')->with('news', $news);
    }

    /**
     * Update the specified News in storage.
     */
    public function update($id, UpdateNewsRequest $request)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        if ($request->hasfile('image')) {
            removeImage($news->image, 'images/news/');
        }

        $new = $this->newsRepository->update($request->all(), $id);

        if ($request->hasfile('image')) {
            $news->image = uploadImage($request->file('image'), 'images/news/', null, null);
        }
        $news->save();

        Flash::success('News updated successfully.');

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified News from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }
        if ($news->image != '') {
            removeImage($news->image, 'images/news/');
        }

        $this->newsRepository->delete($id);

        Flash::success('News deleted successfully.');

        return redirect(route('news.index'));
    }

    public function sort(Request $request)
    {
        $news = $this->newsRepository->all();

        foreach ($news as $new) {
            foreach ($request->order as $order) {
                if ($order['id'] == $new->id) {
                    $new->position = $order['position'];
                    $new->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}