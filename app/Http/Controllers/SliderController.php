<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;
use App\Models\Slider;
use Flash;

class SliderController extends AppBaseController
{
    /** @var SliderRepository $sliderRepository*/
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->sliderRepository = $sliderRepo;
        
        $this->middleware(['admin_permissions:add-home-page-slider'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-home-page-slider'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-home-page-slider'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-home-page-slider'])->only(['index', 'show']);
    }

    /**
     * Display a listing of the Slider.
     */
    public function index(Request $request)
    {
        $query = Slider::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . "%")
                    ->orwhere('tagline', 'LIKE', '%' . $search . "%")
                    ->orwhere('button_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('button_url', 'LIKE', '%' . $search . "%");
            });
        }
        $sliders = $query->sortable('position', 'asc')->paginate(10);

        return view('sliders.index')
            ->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new Slider.
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created Slider in storage.
     */
    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();

        $slider = $this->sliderRepository->create($input);
        if ($request->hasfile('image')) {
            $slider->image = uploadImage($request->file('image'), 'images/slider/', applicationSettings('banner-image-width'), null);
        }
        $slider->save();

        Flash::success('Slider added successfully.');

        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified Slider.
     */
    public function show($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        return view('sliders.show')->with('slider', $slider);
    }

    /**
     * Show the form for editing the specified Slider.
     */
    public function edit($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        return view('sliders.edit')->with('slider', $slider);
    }

    /**
     * Update the specified Slider in storage.
     */
    public function update($id, UpdateSliderRequest $request)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        if ($request->hasfile('image')) {
            removeImage($slider->image, 'images/slider/');
        }

        $slider = $this->sliderRepository->update($request->all(), $id);

        if ($request->hasfile('image')) {
            $slider->image = uploadImage($request->file('image'), 'images/slider/', applicationSettings('banner-image-width'), null);
        }
        $slider->save();

        Flash::success('Slider updated successfully.');

        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified Slider from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        if ($slider->image != '') {
            removeImage($slider->image, 'images/slider/');
        }

        $this->sliderRepository->delete($id);

        Flash::success('Slider deleted successfully.');

        return redirect(route('sliders.index'));
    }

    public function sort(Request $request)
    {
        $sliders = $this->sliderRepository->all();

        foreach ($sliders as $slider) {
            foreach ($request->order as $order) {
                if ($order['id'] == $slider->id) {
                    $slider->position = $order['position'];
                    $slider->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}