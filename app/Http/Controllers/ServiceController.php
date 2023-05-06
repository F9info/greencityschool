<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use Flash;

class ServiceController extends AppBaseController
{
    /** @var ServiceRepository $serviceRepository*/
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     */
    public function index(Request $request)
    {
        $services = $this->serviceRepository->paginate(10);

        return view('services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     */
    public function create()
    {
        $servicenames = ServiceCategory::all()->pluck('name', 'id');
        return view('services.create', compact('servicenames'));

    }

    /**
     * Store a newly created Service in storage.
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();

        $service = $this->serviceRepository->create($input);

        if ($request->hasfile('image')) {
            $service->image = uploadImage($request->file('image'), 'images/services/', null, null);
        }
        $service->save();

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $data[] = uploadImage($image, 'images/services/', null, null);
            }
            $service->gallery = $data;
        }
        $service->save();


        Flash::success('Service saved successfully.');

        return redirect(route('services.index'));
    }

    /**
     * Display the specified Service.
     */
    public function show($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     */
    public function edit($id)
    {
        $servicenames = ServiceCategory::all()->pluck('name', 'id');
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

       
        return view('services.edit', compact('service', 'servicenames'));
    }

    /**
     * Update the specified Service in storage.
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

        $data = $service->gallery;
        $service = $this->serviceRepository->update($request->all(), $id);
        


        if ($request->hasfile('image')) {
            removeImage($service->image, 'images/services/');
        }
        $service = $this->serviceRepository->update($request->all(), $id);
        if ($request->hasfile('image')) {
            $service->image = uploadImage($request->file('image'), 'images/services/', null, null);
        }
        $service->save();

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $data[] = uploadImage($image, 'images/services/', null, null);
            }
            $service->gallery = $data;
        }
        $service->save();




        Flash::success('Service updated successfully.');

        return redirect(route('services.index'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('services.index'));
        }

        if ($service->image != null) {
            removeImage($service->image, 'images/services/');
        }

        if ($service->gallery != '') {
            foreach ($service->gallery as $gal) {
                removeImage($gal, 'images/inner-pages/');
            }
        }

        $this->serviceRepository->delete($id);
        Flash::success('Service deleted successfully.');


        return redirect(route('services.index'));
    }

    public function removeServicesImage($id, $value)
    {
        $service = $this->serviceRepository->find($id);
        $array = $service->gallery;
        $key = array_search($value, $array);
        if (false !== $key) {
            removeImage($array[$key], 'images/services/');
            unset($array[$key]);
        }
        $service->gallery = $array;
        $service->save();
        Flash::success('Image Deleted.');
        return redirect(route('service.edit', $id));
    }
}
