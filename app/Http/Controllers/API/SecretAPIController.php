<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSecretAPIRequest;
use App\Http\Requests\API\UpdateSecretAPIRequest;
use App\Models\Secret;
use App\Repositories\SecretRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SecretController
 * @package App\Http\Controllers\API
 */

class SecretAPIController extends AppBaseController
{
    /** @var  SecretRepository */
    private $secretRepository;

    public function __construct(SecretRepository $secretRepo)
    {
        $this->secretRepository = $secretRepo;
    }

    /**
     * Display a listing of the Secret.
     * GET|HEAD /secrets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $secrets = $this->secretRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($secrets->toArray(), 'Secrets retrieved successfully');
    }

    /**
     * Store a newly created Secret in storage.
     * POST /secrets
     *
     * @param CreateSecretAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSecretAPIRequest $request)
    {
        $input = $request->all();

        $secret = $this->secretRepository->create($input);

        return $this->sendResponse($secret->toArray(), 'Secret saved successfully');
    }

    /**
     * Display the specified Secret.
     * GET|HEAD /secrets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Secret $secret */
        $secret = $this->secretRepository->find($id);

        if (empty($secret)) {
            return $this->sendError('Secret not found');
        }

        return $this->sendResponse($secret->toArray(), 'Secret retrieved successfully');
    }

    /**
     * Update the specified Secret in storage.
     * PUT/PATCH /secrets/{id}
     *
     * @param int $id
     * @param UpdateSecretAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecretAPIRequest $request)
    {
        $input = $request->all();

        /** @var Secret $secret */
        $secret = $this->secretRepository->find($id);

        if (empty($secret)) {
            return $this->sendError('Secret not found');
        }

        $secret = $this->secretRepository->update($input, $id);

        return $this->sendResponse($secret->toArray(), 'Secret updated successfully');
    }

    /**
     * Remove the specified Secret from storage.
     * DELETE /secrets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Secret $secret */
        $secret = $this->secretRepository->find($id);

        if (empty($secret)) {
            return $this->sendError('Secret not found');
        }

        $secret->delete();

        return $this->sendSuccess('Secret deleted successfully');
    }
}
