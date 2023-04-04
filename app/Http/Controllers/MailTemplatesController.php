<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMailTemplatesRequest;
use App\Http\Requests\UpdateMailTemplatesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\MailTemplates;
use App\Repositories\MailTemplatesRepository;
use Illuminate\Http\Request;
use Flash;

class MailTemplatesController extends AppBaseController
{
    /** @var MailTemplatesRepository $mailTemplatesRepository*/
    private $mailTemplatesRepository;

    public function __construct(MailTemplatesRepository $mailTemplatesRepo)
    {
        $this->mailTemplatesRepository = $mailTemplatesRepo;
        
        $this->middleware(['admin_permissions:add-mail-templates'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-mail-templates'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-mail-templates'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-mail-templates'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the MailTemplates.
     */
    public function index(Request $request)
    {
        $query = MailTemplates::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'LIKE', '%' . $search . "%")
                ->orwhere('subject', 'LIKE', '%' . $search . "%");
            });
        }
        
        $mailTemplates = $query->orderBy('position', 'asc')->paginate(10);

        return view('mail_templates.index')
            ->with('mailTemplates', $mailTemplates);
    }

    /**
     * Show the form for creating a new MailTemplates.
     */
    public function create()
    {
        return view('mail_templates.create');
    }

    /**
     * Store a newly created MailTemplates in storage.
     */
    public function store(CreateMailTemplatesRequest $request)
    {
        $input = $request->all();

        $mailTemplates = $this->mailTemplatesRepository->create($input);

        Flash::success('Mail Templates saved successfully.');

        return redirect(route('mailTemplates.index'));
    }

    /**
     * Display the specified MailTemplates.
     */
    public function show($id)
    {
        $mailTemplates = $this->mailTemplatesRepository->find($id);

        if (empty($mailTemplates)) {
            Flash::error('Mail Templates not found');

            return redirect(route('mailTemplates.index'));
        }

        return view('mail_templates.show')->with('mailTemplates', $mailTemplates);
    }

    /**
     * Show the form for editing the specified MailTemplates.
     */
    public function edit($id)
    {
        $mailTemplates = $this->mailTemplatesRepository->find($id);

        if (empty($mailTemplates)) {
            Flash::error('Mail Templates not found');

            return redirect(route('mailTemplates.index'));
        }

        return view('mail_templates.edit')->with('mailTemplates', $mailTemplates);
    }

    /**
     * Update the specified MailTemplates in storage.
     */
    public function update($id, UpdateMailTemplatesRequest $request)
    {
        $mailTemplates = $this->mailTemplatesRepository->find($id);

        if (empty($mailTemplates)) {
            Flash::error('Mail Templates not found');

            return redirect(route('mailTemplates.index'));
        }

        $mailTemplates = $this->mailTemplatesRepository->update($request->all(), $id);

        Flash::success('Mail Templates updated successfully.');

        return redirect(route('mailTemplates.index'));
    }

    /**
     * Remove the specified MailTemplates from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mailTemplates = $this->mailTemplatesRepository->find($id);

        if (empty($mailTemplates)) {
            Flash::error('Mail Templates not found');

            return redirect(route('mailTemplates.index'));
        }

        $this->mailTemplatesRepository->delete($id);

        Flash::success('Mail Templates deleted successfully.');

        return redirect(route('mailTemplates.index'));
    }
}
