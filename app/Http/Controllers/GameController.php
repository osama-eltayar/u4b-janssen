<?php

namespace App\Http\Controllers;

use App\Exports\GamesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Country;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function create()
    {
        $countries = Country::all();
        return view('game.create', compact('countries'));
    }

    public function store(GameRequest $gameRequest)
    {
        $game = Game::query()->firstOrCreate($gameRequest->only('email'), $gameRequest->only('name', 'country_id'));

        return response(['game_id' => $game->id]);
    }

    public function update(Game $game,Request $request)
    {
        $game->update(['score' => $request->score,'remainingDuration'=>$request->remainingDuration]);
        return response([]);
    }

    public function export()
    {
        $gamesQuery = Game::query()->with('country');
        return (new GamesExport($gamesQuery))->download('game-users.xlsx',
                                                        NULL,
                                                        [
                                                            "Cache-Control" => " no-cache, must-revalidate",
                                                            "Expires"       => " Sat, 26 Jul 1997 05:00:00 GMT"
                                                        ]);
    }

}
