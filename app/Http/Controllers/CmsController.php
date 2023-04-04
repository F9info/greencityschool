<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Cms;
use App\Repositories\CmsRepository;
use Illuminate\Http\Request;
use Flash;

class CmsController extends AppBaseController
{
    /** @var CmsRepository $cmsRepository*/
    private $cmsRepository;

    public function __construct(CmsRepository $cmsRepo)
    {
        $this->cmsRepository = $cmsRepo;

        $this->middleware(['admin_permissions:add-pages'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-pages'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-pages'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-pages'])->only(['index', 'show']);
    }

    /**
     * Display a listing of the Cms.
     */
    public function index(Request $request)
    {
        $query = Cms::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . "%")->orwhere('slug', 'LIKE', '%' . $search . "%")->orwhere('parent', 'LIKE', '%' . $search . "%");
            });
        }
        $cms = $query->sortable('position', 'asc')->paginate(10);

        return view('cms.index')
            ->with('cms', $cms);
    }

    /**
     * Show the form for creating a new Cms.
     */
    public function create()
    {
        $pages = Cms::all()->pluck('title', 'id');
        return view('cms.create', compact('pages'));
    }

    /**
     * Store a newly created Cms in storage.
     */
    public function store(CreateCmsRequest $request)
    {
        $input = $request->all();

        $cms = $this->cmsRepository->create($input);
        if ($request->hasfile('banner_image')) {
            $cms->banner_image = uploadImage($request->file('banner_image'), 'images/inner-pages/', null, null);
        }
        $cms->main_menu = $request->has('main_menu') ? 1 : 0;
        $cms->top_menu = $request->has('top_menu') ? 1 : 0;
        $cms->side_menu = $request->has('side_menu') ? 1 : 0;
        $cms->footer_menu = $request->has('footer_menu') ? 1 : 0;

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $data[] = uploadImage($image, 'images/inner-pages/', null, null);
            }
            $cms->gallery = $data;
        }
        $cms->save();

        Flash::success('CMS Page added successfully.');

        return redirect(route('cms.index'));
    }

    /**
     * Display the specified Cms.
     */
    public function show($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        return view('cms.show')->with('cms', $cms);
    }

    /**
     * Show the form for editing the specified Cms.
     */
    public function edit($id)
    {
        $pages = Cms::all()->pluck('title', 'id');
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        return view('cms.edit', compact('cms', 'pages'));
    }

    /**
     * Update the specified Cms in storage.
     */
    public function update($id, UpdateCmsRequest $request)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }

        if ($request->hasfile('banner_image')) {
            removeImage($cms->banner_image, 'images/inner-pages/');
        }

        $data = $cms->gallery;
        $cms = $this->cmsRepository->update($request->all(), $id);
        if ($request->hasfile('banner_image')) {
            $cms->banner_image = uploadImage($request->file('banner_image'), 'images/inner-pages/', null, null);
        }
        $cms->main_menu = $request->has('main_menu') ? 1 : 0;
        $cms->top_menu = $request->has('top_menu') ? 1 : 0;
        $cms->side_menu = $request->has('side_menu') ? 1 : 0;
        $cms->footer_menu = $request->has('footer_menu') ? 1 : 0;
        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $data[] = uploadImage($image, 'images/inner-pages/', null, null);
            }
            $cms->gallery = $data;
        }
        $cms->save();

        Flash::success('CMS Page updated successfully.');

        return redirect(route('cms.index'));
    }

    /**
     * Remove the specified Cms from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            Flash::error('Cms not found');

            return redirect(route('cms.index'));
        }
        if (getSubMenu($cms->id)->count() > 0) {
            Flash::error('Unable to delete because this page contains sub pages.');
        } else {
            if ($cms->banner_image != '') {
                removeImage($cms->banner_image, 'images/inner-pages/');
            }

            if ($cms->gallery != '') {
                foreach ($cms->gallery as $gal) {
                    removeImage($gal, 'images/inner-pages/');
                }
            }

            $this->cmsRepository->delete($id);
            Flash::success('Cms deleted successfully.');
        }

        return redirect(route('cms.index'));
    }

    public function removeCMSImage($id, $value)
    {
        $cms = $this->cmsRepository->find($id);
        $array = $cms->gallery;
        $key = array_search($value, $array);
        if (false !== $key) {
            removeImage($array[$key], 'images/inner-pages/');
            unset($array[$key]);
        }
        $cms->gallery = $array;
        $cms->save();
        Flash::success('Image Deleted.');
        return redirect(route('cms.edit', $id));
    }

    public function sort(Request $request)
    {
        $cms = $this->cmsRepository->all();

        foreach ($cms as $cm) {
            foreach ($request->order as $order) {
                if ($order['id'] == $cm->id) {
                    $cm->position = $order['position'];
                    $cm->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
