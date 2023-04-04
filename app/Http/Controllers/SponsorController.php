<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\SponsorCategory;
use Flash;

class SponsorController extends AppBaseController
{
    /** @var SponsorRepository $sponsorRepository*/
    private $sponsorRepository;

    public function __construct(SponsorRepository $sponsorRepo)
    {
        $this->sponsorRepository = $sponsorRepo;
        
        $this->middleware(['admin_permissions:add-sponsors'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-sponsors'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-sponsors'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-sponsors'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Sponsor.
     */
    public function index(Request $request)
    {
        $categories = SponsorCategory::orderBy('position', 'asc')->get();
        
        $query = Sponsor::query();

        if (!empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . "%");
        }
        if(!empty($request->category)) {
            $query->where('sponsor_category_id', $request->category);
        }

        $sort = $request->sort ?? 'sponsors.created_at';
        $direction = $request->direction ?? 'desc';

        $sponsors = $query->orderBy($sort, $direction)->paginate(10);

        return view('sponsors.index', compact('sponsors', 'categories'));
    }

    /**
     * Show the form for creating a new Sponsor.
     */
    public function create()
    {
        $categories = SponsorCategory::all()->pluck('category_name', 'id');
        return view('sponsors.create', compact('categories'));
    }

    /**
     * Store a newly created Sponsor in storage.
     */
    public function store(CreateSponsorRequest $request)
    {
        $input = $request->all();

        $sponsor = $this->sponsorRepository->create($input);
        if ($request->hasfile('image')) {
            $sponsor->image = uploadImage($request->file('image'), 'images/sponsor/', null, null);
        }
        $sponsor->save();

        Flash::success('Sponsor added successfully.');

        return redirect(route('sponsors.index'));
    }

    /**
     * Display the specified Sponsor.
     */
    public function show($id)
    {
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            Flash::error('Sponsor not found');

            return redirect(route('sponsors.index'));
        }

        return view('sponsors.show')->with('sponsor', $sponsor);
    }

    /**
     * Show the form for editing the specified Sponsor.
     */
    public function edit($id)
    {
        $categories = SponsorCategory::all()->pluck('category_name', 'id');
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            Flash::error('Sponsor not found');

            return redirect(route('sponsors.index'));
        }

        return view('sponsors.edit', compact('sponsor', 'categories'));
    }

    /**
     * Update the specified Sponsor in storage.
     */
    public function update($id, UpdateSponsorRequest $request)
    {
        
        
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            Flash::error('Sponsor not found');

            return redirect(route('sponsors.index'));
        }

        if ($request->hasfile('image')) {
            removeImage($sponsor->image, 'images/sponsor/');
        }

        $sponsor = $this->sponsorRepository->update($request->all(), $id);

        if ($request->hasfile('image')) {
            $sponsor->image = uploadImage($request->file('image'), 'images/sponsor/', null, null);
        }
        $sponsor->save();

        Flash::success('Sponsor updated successfully.');

        return redirect(route('sponsors.index'));
    }

    /**
     * Remove the specified Sponsor from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            Flash::error('Sponsor not found');

            return redirect(route('sponsors.index'));
        }

        if ($sponsor->image != '') {
            removeImage($sponsor->image, 'images/sponsor/');
        }

        $this->sponsorRepository->delete($id);

        Flash::success('Sponsor deleted successfully.');

        return redirect(route('sponsors.index'));
    }

    public function sort(Request $request)
    {
        $sponsors = $this->sponsorRepository->all();

        foreach ($sponsors as $sponsor) {
            foreach ($request->order as $order) {
                if ($order['id'] == $sponsor->id) {
                    $sponsor->position = $order['position'];
                    $sponsor->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
