<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhotoGalleryCategoryRequest;
use App\Http\Requests\UpdatePhotoGalleryCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PhotoGalleryCategoryRepository;
use Illuminate\Http\Request;
use App\Models\PhotoGalleryCategory;
use Flash;

class PhotoGalleryCategoryController extends AppBaseController
{
    /** @var PhotoGalleryCategoryRepository $photoGalleryCategoryRepository*/
    private $photoGalleryCategoryRepository;

    public function __construct(PhotoGalleryCategoryRepository $photoGalleryCategoryRepo)
    {
        $this->photoGalleryCategoryRepository = $photoGalleryCategoryRepo;
        
        $this->middleware(['admin_permissions:add-photo-categories'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-photo-categories'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-photo-categories'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-photo-categories'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the PhotoGalleryCategory.
     */
    public function index(Request $request)
    {
        $query = PhotoGalleryCategory::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . "%")
                  ->orwhere('year', 'LIKE', '%' . $search . "%");
            });
        }
        
        $photoGalleryCategories = $query->sortable('position', 'asc')->paginate(10);


        return view('photo_gallery_categories.index')
            ->with('photoGalleryCategories', $photoGalleryCategories);
    }

    /**
     * Show the form for creating a new PhotoGalleryCategory.
     */
    public function create()
    {
        return view('photo_gallery_categories.create');
    }

    /**
     * Store a newly created PhotoGalleryCategory in storage.
     */
    public function store(CreatePhotoGalleryCategoryRequest $request)
    {
        $input = $request->all();

        $photoGalleryCategory = $this->photoGalleryCategoryRepository->create($input);

        Flash::success('Photo Gallery Category added successfully.');

        return redirect(route('photoGalleryCategories.index'));
    }

    /**
     * Display the specified PhotoGalleryCategory.
     */
    public function show($id)
    {
        $photoGalleryCategory = $this->photoGalleryCategoryRepository->find($id);

        if (empty($photoGalleryCategory)) {
            Flash::error('Photo Gallery Category not found');

            return redirect(route('photoGalleryCategories.index'));
        }

        return view('photo_gallery_categories.show')->with('photoGalleryCategory', $photoGalleryCategory);
    }

    /**
     * Show the form for editing the specified PhotoGalleryCategory.
     */
    public function edit($id)
    {
        $photoGalleryCategory = $this->photoGalleryCategoryRepository->find($id);

        if (empty($photoGalleryCategory)) {
            Flash::error('Photo Gallery Category not found');

            return redirect(route('photoGalleryCategories.index'));
        }

        return view('photo_gallery_categories.edit')->with('photoGalleryCategory', $photoGalleryCategory);
    }

    /**
     * Update the specified PhotoGalleryCategory in storage.
     */
    public function update($id, UpdatePhotoGalleryCategoryRequest $request)
    {
        $photoGalleryCategory = $this->photoGalleryCategoryRepository->find($id);

        if (empty($photoGalleryCategory)) {
            Flash::error('Photo Gallery Category not found');

            return redirect(route('photoGalleryCategories.index'));
        }

        $photoGalleryCategory = $this->photoGalleryCategoryRepository->update($request->all(), $id);

        Flash::success('Photo Gallery Category updated successfully.');

        return redirect(route('photoGalleryCategories.index'));
    }

    /**
     * Remove the specified PhotoGalleryCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $photoGalleryCategory = $this->photoGalleryCategoryRepository->find($id);

        if (empty($photoGalleryCategory)) {
            Flash::error('Photo Gallery Category not found');

            return redirect(route('photoGalleryCategories.index'));
        }

        if($photoGalleryCategory->photoGalleries->count() > 0) {
            Flash::error('Unable to delete Photo Gallery Category. Please delete assigned Photo Galleries first.');
        }else{
            $this->photoGalleryCategoryRepository->delete($id);
            Flash::success('Photo Gallery Category deleted successfully.');
        }

        return redirect(route('photoGalleryCategories.index'));
    }

    public function sort(Request $request)
    {
        $photoGalleryCategories = $this->photoGalleryCategoryRepository->all();

        foreach ($photoGalleryCategories as $photoGalleryCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $photoGalleryCategory->id) {
                    $photoGalleryCategory->position = $order['position'];
                    $photoGalleryCategory->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}