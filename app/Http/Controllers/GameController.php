<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Repositories\GameRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GameController extends AppBaseController
{
    /** @var GameRepository $gameRepository*/
    private $gameRepository;

    public function __construct(GameRepository $gameRepo)
    {
        $this->gameRepository = $gameRepo;
    }

    /**
     * Display a listing of the Game.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $games = $this->gameRepository->all();

        return view('games.index')
            ->with('games', $games);
    }

    /**
     * Show the form for creating a new Game.
     *
     * @return Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created Game in storage.
     *
     * @param CreateGameRequest $request
     *
     * @return Response
     */
    public function store(CreateGameRequest $request)
    {
        $input = $request->all();

        $game = $this->gameRepository->create($input);

        Flash::success('Game saved successfully.');

        return redirect(route('games.index'));
    }

    /**
     * Display the specified Game.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $game = $this->gameRepository->find($id);

        if (empty($game)) {
            Flash::error('Game not found');

            return redirect(route('games.index'));
        }

        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified Game.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $game = $this->gameRepository->find($id);

        if (empty($game)) {
            Flash::error('Game not found');

            return redirect(route('games.index'));
        }

        return view('games.edit')->with('game', $game);
    }

    /**
     * Update the specified Game in storage.
     *
     * @param int $id
     * @param UpdateGameRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGameRequest $request)
    {
        $game = $this->gameRepository->find($id);

        if (empty($game)) {
            Flash::error('Game not found');

            return redirect(route('games.index'));
        }

        $game = $this->gameRepository->update($request->all(), $id);

        Flash::success('Game updated successfully.');

        return redirect(route('games.index'));
    }

    /**
     * Remove the specified Game from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $game = $this->gameRepository->find($id);

        if (empty($game)) {
            Flash::error('Game not found');

            return redirect(route('games.index'));
        }

        $this->gameRepository->delete($id);

        Flash::success('Game deleted successfully.');

        return redirect(route('games.index'));
    }
}
