<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplicationSettingRequest;
use App\Http\Requests\UpdateApplicationSettingRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ApplicationSettingRepository;
use Illuminate\Http\Request;
use App\Models\ApplicationSetting;
use App\Models\Category;
use Flash;

class ApplicationSettingController extends AppBaseController
{
    /** @var ApplicationSettingRepository $applicationSettingRepository*/
    private $applicationSettingRepository;

    public function __construct(ApplicationSettingRepository $applicationSettingRepo)
    {
        $this->applicationSettingRepository = $applicationSettingRepo;
        
        $this->middleware(['admin_permissions:add-developer-settings-list'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-developer-settings-list'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-developer-settings-list'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-developer-settings-list'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the ApplicationSetting.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = ApplicationSetting::query();

        $search = $request->search;
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('field_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('slug', 'LIKE', '%' . $search . "%");
            });
        }
        if (!empty($request->input_type)) {
            $query->where('input_type', $request->input_type);
        }
        if (!empty($request->type)) {
            $query->where('type', $request->type);
        }
        if (!empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        $applicationSettings = $query->orderBy('position', 'asc')->paginate(25);

        return view('application_settings.index', compact('categories', 'applicationSettings'));
    }

    /**
     * Show the form for creating a new ApplicationSetting.
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('application_settings.create', compact('categories'));
    }

    /**
     * Store a newly created ApplicationSetting in storage.
     */
    public function store(CreateApplicationSettingRequest $request)
    {
        $input = $request->all();

        $applicationSetting = $this->applicationSettingRepository->create($input);

        Flash::success('Application Setting saved successfully.');

        return redirect(route('applicationSettings.index'));
    }

    /**
     * Display the specified ApplicationSetting.
     */
    public function show($id)
    {
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            Flash::error('Application Setting not found');

            return redirect(route('applicationSettings.index'));
        }

        return view('application_settings.show')->with('applicationSetting', $applicationSetting);
    }

    /**
     * Show the form for editing the specified ApplicationSetting.
     */
    public function edit($id)
    {
        $categories = Category::all()->pluck('name', 'id');
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            Flash::error('Application Setting not found');

            return redirect(route('applicationSettings.index'));
        }

        return view('application_settings.edit', compact('categories', 'applicationSetting'));
    }

    /**
     * Update the specified ApplicationSetting in storage.
     */
    public function update($id, UpdateApplicationSettingRequest $request)
    {
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            Flash::error('Application Setting not found');

            return redirect(route('applicationSettings.index'));
        }

        $applicationSetting = $this->applicationSettingRepository->update($request->all(), $id);

        Flash::success('Application Setting updated successfully.');

        return redirect(route('applicationSettings.index'));
    }

    /**
     * Remove the specified ApplicationSetting from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            Flash::error('Application Setting not found');

            return redirect(route('applicationSettings.index'));
        }

        $this->applicationSettingRepository->delete($id);

        Flash::success('Application Setting deleted successfully.');

        return redirect(route('applicationSettings.index'));
    }

    public function sort(Request $request)
    {
        $applicationSettings = $this->applicationSettingRepository->all();

        foreach ($applicationSettings as $applicationSetting) {
            foreach ($request->order as $order) {
                if ($order['id'] == $applicationSetting->id) {
                    $applicationSetting->position = $order['position'];
                    $applicationSetting->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }

    public function applicationSettingsView()
    {
        $settings = ApplicationSetting::where('type', 'application-settings')->orderBy('position', 'asc')->get();
        $heading = "application-settings";
        return view('application_settings.settings', compact('settings', 'heading'));
    }

    public function developerSettingsView()
    {
        $settings = ApplicationSetting::where('type', 'developer-settings')->orderBy('position', 'asc')->get();
        $heading = "developer-settings";
        return view('application_settings.settings', compact('settings', 'heading'));
    }

    public function homePageSettingsView()
    {
        $settings = ApplicationSetting::where('type', 'home-page-blocks')->orderBy('position', 'asc')->get();
        $heading = "home-page-blocks";
        return view('application_settings.settings', compact('settings', 'heading'));
    }

    public function generalSettingsView()
    {
        $settings = ApplicationSetting::where('type', 'general-settings')->orderBy('position', 'asc')->get();
        $heading = "general-settings";
        return view('application_settings.settings', compact('settings', 'heading'));
    }

    public function updateSettings(Request $request)
    {
        $settings = ApplicationSetting::where('type', $request->url)->get();
        foreach ($settings as $setting) {
            if ($setting->input_type != 'heading') {
                $name = $setting->id;
                if ($setting->input_type == 'file') {
                    if ($request->hasfile($setting->id)) {
                        $setting->value = uploadImage($request->file($setting->id), 'images/site-images/', null, null);
                    }
                } else {
                    $setting->value = $request->$name;
                }
                $setting->update();
            }
        }
        Flash::success('Setting updated successfully.');
        return redirect(url($request->url));
    }
}