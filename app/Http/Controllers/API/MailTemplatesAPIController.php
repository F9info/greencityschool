<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMailTemplatesAPIRequest;
use App\Http\Requests\API\UpdateMailTemplatesAPIRequest;
use App\Models\MailTemplates;
use App\Repositories\MailTemplatesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class MailTemplatesAPIController
 */
class MailTemplatesAPIController extends AppBaseController
{
    private MailTemplatesRepository $mailTemplatesRepository;

    public function __construct(MailTemplatesRepository $mailTemplatesRepo)
    {
        $this->mailTemplatesRepository = $mailTemplatesRepo;
    }

    /**
     * Display a listing of the MailTemplates.
     * GET|HEAD /mail-templates
     */
    public function index(Request $request): JsonResponse
    {
        $mailTemplates = $this->mailTemplatesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mailTemplates->toArray(), 'Mail Templates retrieved successfully');
    }

    /**
     * Store a newly created MailTemplates in storage.
     * POST /mail-templates
     */
    public function store(CreateMailTemplatesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $mailTemplates = $this->mailTemplatesRepository->create($input);

        return $this->sendResponse($mailTemplates->toArray(), 'Mail Templates saved successfully');
    }

    /**
     * Display the specified MailTemplates.
     * GET|HEAD /mail-templates/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var MailTemplates $mailTemplates */
        $mailTemplates = $this->mailTemplatesRepository->find($id);

        if (empty($mailTemplates)) {
            return $this->sendError('Mail Templates not found');
        }

        return $this->sendResponse($mailTemplates->toArray(), 'Mail Templates retrieved successfully');
    }

    /**
     * Update the specified MailTemplates in storage.
     * PUT/PATCH /mail-templates/{id}
     */
    public function update($id, UpdateMailTemplatesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var MailTemplates $mailTemplates */
        $mailTemplates = $this->mailTemplatesRepository->find($id);

        if (empty($mailTemplates)) {
            return $this->sendError('Mail Templates not found');
        }

        $mailTemplates = $this->mailTemplatesRepository->update($input, $id);

        return $this->sendResponse($mailTemplates->toArray(), 'MailTemplates updated successfully');
    }

    /**
     * Remove the specified MailTemplates from storage.
     * DELETE /mail-templates/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var MailTemplates $mailTemplates */
        $mailTemplates = $this->mailTemplatesRepository->find($id);

        if (empty($mailTemplates)) {
            return $this->sendError('Mail Templates not found');
        }

        $mailTemplates->delete();

        return $this->sendSuccess('Mail Templates deleted successfully');
    }
}
