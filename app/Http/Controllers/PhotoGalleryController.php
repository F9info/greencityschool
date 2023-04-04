<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhotoGalleryRequest;
use App\Http\Requests\UpdatePhotoGalleryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PhotoGalleryRepository;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use Flash;

class PhotoGalleryController extends AppBaseController
{
    /** @var PhotoGalleryRepository $photoGalleryRepository*/
    private $photoGalleryRepository;

    public function __construct(PhotoGalleryRepository $photoGalleryRepo)
    {
        $this->photoGalleryRepository = $photoGalleryRepo;

        $this->middleware(['admin_permissions:add-photo-gallery'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-photo-gallery'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-photo-gallery'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-photo-gallery'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the PhotoGallery.
     */
    public function index(Request $request)
    {
        $categories = PhotoGalleryCategory::orderBy('position', 'asc')->get();

        $query = PhotoGallery::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . "%");
            });
        }
        if (!empty($request->category)) {
            $query->where('photo_gallery_category_id', $request->category);
        }

        $photoGalleries = $query->sortable('position', 'asc')->paginate(10);

        return view('photo_galleries.index', compact('photoGalleries', 'categories'));
    }

    /**
     * Show the form for creating a new PhotoGallery.
     */
    public function create()
    {
        $names = PhotoGalleryCategory::all()->pluck('name', 'id');
        return view('photo_galleries.create', compact('names'));
    }

    /**
     * Store a newly created PhotoGallery in storage.
     */
    public function store(CreatePhotoGalleryRequest $request)
    {
        $input = $request->all();

        $photoGallery = $this->photoGalleryRepository->create($input);

        if ($request->hasfile('image')) {
            $photoGallery->image = uploadImage($request->file('image'), 'images/gallery/', null, null);
        }
        $photoGallery->save();

        Flash::success('Photo Gallery added successfully.');

        return redirect(route('photoGalleries.index'));
    }

    /**
     * Display the specified PhotoGallery.
     */
    public function show($id)
    {
        $photoGallery = $this->photoGalleryRepository->find($id);

        if (empty($photoGallery)) {
            Flash::error('Photo Gallery not found');

            return redirect(route('photoGalleries.index'));
        }

        return view('photo_galleries.show')->with('photoGallery', $photoGallery);
    }

    /**
     * Show the form for editing the specified PhotoGallery.
     */
    public function edit($id)
    {
        $names = PhotoGalleryCategory::all()->pluck('name', 'id');
        $photoGallery = $this->photoGalleryRepository->find($id);

        if (empty($photoGallery)) {
            Flash::error('Photo Gallery not found');

            return redirect(route('photoGalleries.index'));
        }

        return view('photo_galleries.edit', compact('photoGallery', 'names'));
    }

    /**
     * Update the specified PhotoGallery in storage.
     */
    public function update($id, UpdatePhotoGalleryRequest $request)
    {
        $photoGallery = $this->photoGalleryRepository->find($id);

        if (empty($photoGallery)) {
            Flash::error('Photo Gallery not found');

            return redirect(route('photoGalleries.index'));
        }

        if ($request->hasfile('image')) {
            removeImage($photoGallery->image, 'images/gallery/');
        }

        $photoGallery = $this->photoGalleryRepository->update($request->all(), $id);

        if ($request->hasfile('image')) {
            $photoGallery->image = uploadImage($request->file('image'), 'images/gallery/', null, null);
        }
        $photoGallery->save();

        Flash::success('Photo Gallery updated successfully.');

        return redirect(route('photoGalleries.index'));
    }

    /**
     * Remove the specified PhotoGallery from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $photoGallery = $this->photoGalleryRepository->find($id);

        if (empty($photoGallery)) {
            Flash::error('Photo Gallery not found');

            return redirect(route('photoGalleries.index'));
        }

        if ($photoGallery->image != '') {
            removeImage($photoGallery->image, 'images/gallery/');
        }

        $this->photoGalleryRepository->delete($id);

        Flash::success('Photo Gallery deleted successfully.');

        return redirect(route('photoGalleries.index'));
    }

    public function sort(Request $request)
    {
        $photoGalleries = $this->photoGalleryRepository->all();

        foreach ($photoGalleries as $photoGallery) {
            foreach ($request->order as $order) {
                if ($order['id'] == $photoGallery->id) {
                    $photoGallery->position = $order['position'];
                    $photoGallery->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
