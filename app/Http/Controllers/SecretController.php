<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSecretRequest;
use App\Http\Requests\UpdateSecretRequest;
use App\Repositories\SecretRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
// use Flash;
use Response;

class SecretController extends AppBaseController
{
    /** @var SecretRepository $secretRepository*/
    private $secretRepository;

    public function __construct(SecretRepository $secretRepo)
    {
        $this->secretRepository = $secretRepo;
    }

    /**
     * Display a listing of the Secret.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $secrets = $this->secretRepository->all();

        return view('secrets.index')
            ->with('secrets', $secrets);
    }

    /**
     * Show the form for creating a new Secret.
     *
     * @return Response
     */
    public function create()
    {
        return view('secrets.create');
    }

    /**
     * Store a newly created Secret in storage.
     *
     * @param CreateSecretRequest $request
     *
     * @return Response
     */
    public function store(CreateSecretRequest $request)
    {
        $input = $request->all();

        $secret = $this->secretRepository->create($input);

        Flash::success('Secret saved successfully.');

        return redirect(route('secrets.index'));
    }

    /**
     * Display the specified Secret.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $secret = $this->secretRepository->find($id);

        if (empty($secret)) {
            Flash::error('Secret not found');

            return redirect(route('secrets.index'));
        }

        return view('secrets.show')->with('secret', $secret);
    }

    /**
     * Show the form for editing the specified Secret.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $secret = $this->secretRepository->find($id);

        if (empty($secret)) {
            Flash::error('Secret not found');

            return redirect(route('secrets.index'));
        }

        return view('secrets.edit')->with('secret', $secret);
    }

    /**
     * Update the specified Secret in storage.
     *
     * @param int $id
     * @param UpdateSecretRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecretRequest $request)
    {
        $secret = $this->secretRepository->find($id);

        if (empty($secret)) {
            Flash::error('Secret not found');

            return redirect(route('secrets.index'));
        }

        $secret = $this->secretRepository->update($request->all(), $id);

        Flash::success('Secret updated successfully.');

        return redirect(route('secrets.index'));
    }

    /**
     * Remove the specified Secret from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $secret = $this->secretRepository->find($id);

        if (empty($secret)) {
            Flash::error('Secret not found');

            return redirect(route('secrets.index'));
        }

        $this->secretRepository->delete($id);

        Flash::success('Secret deleted successfully.');

        return redirect(route('secrets.index'));
    }
}
