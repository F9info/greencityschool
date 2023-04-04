<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVideoGalleryCategoryRequest;
use App\Http\Requests\UpdateVideoGalleryCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VideoGalleryCategoryRepository;
use Illuminate\Http\Request;
use App\Models\VideoGalleryCategory;
use Flash;

class VideoGalleryCategoryController extends AppBaseController
{
    /** @var VideoGalleryCategoryRepository $videoGalleryCategoryRepository*/
    private $videoGalleryCategoryRepository;

    public function __construct(VideoGalleryCategoryRepository $videoGalleryCategoryRepo)
    {
        $this->videoGalleryCategoryRepository = $videoGalleryCategoryRepo;
        
        $this->middleware(['admin_permissions:add-video-categories'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-video-categories'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-video-categories'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-video-categories'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the VideoGalleryCategory.
     */
    public function index(Request $request)
    {

        $query = VideoGalleryCategory::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . "%")
                  ->orwhere('year', 'LIKE', '%' . $search . "%");
            });
        }        
        $videoGalleryCategories = $query->sortable(['position', 'asc'])->paginate(10);

        return view('video_gallery_categories.index')
            ->with('videoGalleryCategories', $videoGalleryCategories);
    }

    /**
     * Show the form for creating a new VideoGalleryCategory.
     */
    public function create()
    {
        return view('video_gallery_categories.create');
    }

    /**
     * Store a newly created VideoGalleryCategory in storage.
     */
    public function store(CreateVideoGalleryCategoryRequest $request)
    {
        $input = $request->all();

        $videoGalleryCategory = $this->videoGalleryCategoryRepository->create($input);

        Flash::success('Video Gallery Category added successfully.');

        return redirect(route('videoGalleryCategories.index'));
    }

    /**
     * Display the specified VideoGalleryCategory.
     */
    public function show($id)
    {
        $videoGalleryCategory = $this->videoGalleryCategoryRepository->find($id);

        if (empty($videoGalleryCategory)) {
            Flash::error('Video Gallery Category not found');

            return redirect(route('videoGalleryCategories.index'));
        }

        return view('video_gallery_categories.show')->with('videoGalleryCategory', $videoGalleryCategory);
    }

    /**
     * Show the form for editing the specified VideoGalleryCategory.
     */
    public function edit($id)
    {
        $videoGalleryCategory = $this->videoGalleryCategoryRepository->find($id);

        if (empty($videoGalleryCategory)) {
            Flash::error('Video Gallery Category not found');

            return redirect(route('videoGalleryCategories.index'));
        }

        return view('video_gallery_categories.edit')->with('videoGalleryCategory', $videoGalleryCategory);
    }

    /**
     * Update the specified VideoGalleryCategory in storage.
     */
    public function update($id, UpdateVideoGalleryCategoryRequest $request)
    {
        $videoGalleryCategory = $this->videoGalleryCategoryRepository->find($id);

        if (empty($videoGalleryCategory)) {
            Flash::error('Video Gallery Category not found');

            return redirect(route('videoGalleryCategories.index'));
        }

        $videoGalleryCategory = $this->videoGalleryCategoryRepository->update($request->all(), $id);

        Flash::success('Video Gallery Category updated successfully.');

        return redirect(route('videoGalleryCategories.index'));
    }

    /**
     * Remove the specified VideoGalleryCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $videoGalleryCategory = $this->videoGalleryCategoryRepository->find($id);

        if (empty($videoGalleryCategory)) {
            Flash::error('Video Gallery Category not found');

            return redirect(route('videoGalleryCategories.index'));
        }

        if($videoGalleryCategory->videoGalleries->count() > 0) {
            Flash::error('Unable to delete Video Gallery Category. Please delete assigned Video Galleries first.');
        }else{
            $this->videoGalleryCategoryRepository->delete($id);
            Flash::success('Video Gallery Category deleted successfully.');
        }

        return redirect(route('videoGalleryCategories.index'));
    }

    public function sort(Request $request)
    {
        $videoGalleryCategories = $this->videoGalleryCategoryRepository->all();

        foreach ($videoGalleryCategories as $videoGalleryCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $videoGalleryCategory->id) {
                    $videoGalleryCategory->position = $order['position'];
                    $videoGalleryCategory->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
