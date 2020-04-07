<?php

namespace App\Http\Controllers;

use App\Event;
use App\Lottery;
use App\Type_game;
use App\Element;
use App\User;
use App\Schedule;
use App\Schedules_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LotterieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        return view("lotterie.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schedules = Schedule::all();

        $user = Auth::user();
        return view("lotterie.new",[
            "user" =>Auth::user(),
            "users" => User::all(),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list(),
            "games" => Type_game::all(),
            "schedule" => $schedules
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
        $lottery = new Lottery();
        $lottery->name = $request["name"];
        $lottery->payment_x = $request["payment_x"];
        $lottery->percent = $request["percent"];
        $lottery->save();

        $request["horarios"] = explode (",", $request["horarios"]);
        $request["boxes"] = explode (",", $request["boxes"]);

        $lottery->schedules()->attach($request["horarios"]);
        $lottery->type_games()->attach($request["boxes"]);

        if($request->file('image')) {
            $request->file('image')->move('img/upload/betting_model',  $lottery->id.'.'.$request->file('image')->getClientOriginalExtension());
            $lottery->fill(['image' => 'img/upload/betting_model/'.$lottery->id.'.'.$request->file('image')->getClientOriginalExtension()])->save();
        }

        return $lottery;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit = Lottery::findOrFail($id);
        //dd($request);
        return view("lotterie.edit",[
            "edit" => $edit,
            "user" => Auth::user(),
            "users" => User::all(),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => Auth::user()->access_list(),
            "games" => Type_game::all(),
            "check" => $edit->schedules()->get(),
            "checkTypeGame" => $edit->type_games()->get(),
            "chekou" => array_get('checkTypeGame','type_game_id'),

            "schedule" => Schedule::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lottery = Lottery::find($id);
        $lottery->name = $request["name"];
        $lottery->payment_x = $request["payment_x"];
        $lottery->percent = $request["percent"];
        $lottery->save();

        $request["horarios"] = explode (",", $request["horarios"]);
        $request["boxes"] = explode (",", $request["boxes"]);

        $lottery->schedules()->sync($request["horarios"]);
        $lottery->type_games()->sync($request["boxes"]);

        if($request->file('image')) {
            $request->file('image')->move('img/upload/betting_model',  $lottery->id.'.'.$request->file('image')->getClientOriginalExtension());
            $lottery->fill(['image' => 'img/upload/betting_model/'.$lottery->id.'.'.$request->file('image')->getClientOriginalExtension()])->save();
        }

        return $lottery;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elim = Lottery::findOrFail($id);
        unlink($elim->image);
        $elim->schedules()->detach();
        $elim->type_games()->detach();
        $elim->delete();
    }

    public function schedule_play(Request $request)
    {
       // dd($request);
     $user = Auth::user();
     $schedules = Schedule::all();
        return view("lotterie.play",[
            "user" =>Auth::user(),
            "users" => User::all(),
            "events" => Event::all()->where("user",Auth::id()),
            "menus" => $user->access_list(),
            "games" => Type_game::all(),
            "schedule" => $schedules,
            "data"=>$request,
        ]);
    }
    public function horarios()
    {
        return Schedule::all();
    }
    public function juegos()
    {
        return Type_game::all();
    }
    public function loterias()
    {
        return Lottery::all();
    }
    public function check_juegos($id)
    {
        $lottery = Lottery::findOrFail($id);
        return $lottery->type_games()->get();
    }
    public function check_horarios($id)
    {
        $lottery = Lottery::findOrFail($id);
        return $lottery->schedules()->get();
    }
}
