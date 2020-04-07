<?php

namespace App\Http\Controllers;

use App\Event;
use App\Type_game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view("typegame.index",[
            "games" => type_game::all(),
            "user" =>Auth::user(),
            "users" => User::all(),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view("typegame.new",[
            "games" => Type_game::all(),
            "user" =>Auth::user(),
            "users" => User::all(),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|unique:type_games,description"
        ]);

        $game = new Type_game();
        $game->description = $data["name"];
        $game->save();

        return redirect("/games");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_game  $type_game
     * @return \Illuminate\Http\Response
     */
    public function show(type_game $type_game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_game  $type_game
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_game $type_game)
    {

        $user = Auth::user();
        return view("typegame.edit",[
            "game" => $type_game,
            "user" =>Auth::user(),
            "users" => User::all(),
            "events" => Event::all()->where("user",Auth::id()),
            "menus" => $user->access_list()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_game  $type_game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, type_game $type_game)
    {
        $data = $request->validate([
            "name" => "required"
        ]);

        $type_game->description = $data["name"];
        $type_game->save();

        return redirect("/games");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_game  $type_game
     * @return \Illuminate\Http\Response
     */
    public function destroy(type_game $type_game)
    {
        /** @var TYPE_NAME $type_game */
        $type_game->delete();

        return redirect("/games");
    }
}
