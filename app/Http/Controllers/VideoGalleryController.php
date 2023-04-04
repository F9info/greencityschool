<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVideoGalleryRequest;
use App\Http\Requests\UpdateVideoGalleryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VideoGalleryRepository;
use Illuminate\Http\Request;
use App\Models\VideoGallery;
use App\Models\VideoGalleryCategory;
use Flash;

class VideoGalleryController extends AppBaseController
{
    /** @var VideoGalleryRepository $videoGalleryRepository*/
    private $videoGalleryRepository;

    public function __construct(VideoGalleryRepository $videoGalleryRepo)
    {
        $this->videoGalleryRepository = $videoGalleryRepo;
        
        $this->middleware(['admin_permissions:add-video-gallery'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-video-gallery'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-video-gallery'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-video-gallery'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the VideoGallery.
     */
    public function index(Request $request)
    {
        $categories = VideoGalleryCategory::orderBy('position', 'asc')->get();
        $query = VideoGallery::query();

        if (!empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . "%");
        }
        if(!empty($request->category)) {
            $query->where('video_gallery_category_id', $request->category);
        }

        $videoGalleries = $query->sortable('position', 'asc')->paginate(10);

        return view('video_galleries.index', compact('categories', 'videoGalleries'));
    }

    /**
     * Show the form for creating a new VideoGallery.
     */
    public function create()
    {
        $names = VideoGalleryCategory::all()->pluck('name', 'id');
        return view('video_galleries.create', compact('names'));
    }

    /**
     * Store a newly created VideoGallery in storage.
     */
    public function store(CreateVideoGalleryRequest $request)
    {
        $input = $request->all();

        $videoGallery = $this->videoGalleryRepository->create($input);

        Flash::success('Video Gallery added successfully.');

        return redirect(route('videoGalleries.index'));
    }

    /**
     * Display the specified VideoGallery.
     */
    public function show($id)
    {
        $videoGallery = $this->videoGalleryRepository->find($id);

        if (empty($videoGallery)) {
            Flash::error('Video Gallery not found');

            return redirect(route('videoGalleries.index'));
        }

        return view('video_galleries.show')->with('videoGallery', $videoGallery);
    }

    /**
     * Show the form for editing the specified VideoGallery.
     */
    public function edit($id)
    {
        $names = VideoGalleryCategory::all()->pluck('name', 'id');
        $videoGallery = $this->videoGalleryRepository->find($id);

        if (empty($videoGallery)) {
            Flash::error('Video Gallery not found');

            return redirect(route('videoGalleries.index'));
        }

        return view('video_galleries.edit', compact('videoGallery', 'names'));
    }

    /**
     * Update the specified VideoGallery in storage.
     */
    public function update($id, UpdateVideoGalleryRequest $request)
    {
        $videoGallery = $this->videoGalleryRepository->find($id);

        if (empty($videoGallery)) {
            Flash::error('Video Gallery not found');

            return redirect(route('videoGalleries.index'));
        }

        $videoGallery = $this->videoGalleryRepository->update($request->all(), $id);

        Flash::success('Video Gallery updated successfully.');

        return redirect(route('videoGalleries.index'));
    }

    /**
     * Remove the specified VideoGallery from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $videoGallery = $this->videoGalleryRepository->find($id);

        if (empty($videoGallery)) {
            Flash::error('Video Gallery not found');

            return redirect(route('videoGalleries.index'));
        }

        $this->videoGalleryRepository->delete($id);

        Flash::success('Video Gallery deleted successfully.');

        return redirect(route('videoGalleries.index'));
    }

    public function sort(Request $request)
    {
        $videoGalleries = $this->videoGalleryRepository->all();

        foreach ($videoGalleries as $videoGallery) {
            foreach ($request->order as $order) {
                if ($order['id'] == $videoGallery->id) {
                    $videoGallery->position = $order['position'];
                    $videoGallery->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
