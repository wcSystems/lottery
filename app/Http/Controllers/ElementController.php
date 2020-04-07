<?php

namespace App\Http\Controllers;

use App\Element;
use App\Event;
use App\Type_game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(type_game $type_game)
    {
        $user = Auth::user();
        return view("typegame.element.list",[
            "user" =>Auth::user(),
            "users" => User::all()->where("role_id","=",1),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list(),
            "elements" => $type_game->elements()->get(),
            "game" => $type_game,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(type_game $type_game)
    {
        $user = Auth::user();
        return view("typegame.element.new",[
            "user" =>Auth::user(),
            "users" => User::all()->where("role_id","=",1),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list(),
            "game" => $type_game,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,type_game $type_game)
    {
        $data = $request;
        //dd($type_game->description);

         $element = new Element();

        $element->description = $data["name"];
        $element->type_game_id = $type_game->id;
        $element->save();
        $valor_code = Element::findOrFail($element->id);
        $valor_code->code = $element->id;
        $valor_code->save();
         if($request->file("image"))
         {
            $request->file('image')->move('img/elements/'.$type_game->description, $element->id.'.'.$request->file('image')->getClientOriginalExtension());
            $element->fill(['image' => 'img/elements/'.$type_game->description.'/'. $element->id.'.'.$request->file('image')->getClientOriginalExtension()])->save();

         }

        return redirect("/games/".$type_game->id."/elements");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function edit(type_game $type_game,element $element)
    {
        //dd($element);
         $user = Auth::user();
        return view("typegame.element.edit",[
            "user" =>Auth::user(),
            "users" => User::all()->where("role_id","=",1),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list(),
            "game" => $type_game,
            "element" => $element
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,type_game $type_game,$element)
    {
        //dd($element);

        $data = $request;
        $element = Element::findOrFail($element);

        $element->description = $data["name"];
        $element->save();
        /* if('img/elements/'.$type_game->description.'/'. $element->id.'.'.$request->file('image')->getClientOriginalExtension()){
            return 'hola';
        } */
         if($request->file("image"))
         {
             Storage::delete('img/elements/'.$type_game->description, $element->id.'.'.$request->file('image')->getClientOriginalExtension());

            $request->file('image')->move('img/elements/'.$type_game->description, $element->id.'.'.$request->file('image')->getClientOriginalExtension());
            $element->fill(['image' => 'img/elements/'.$type_game->description.'/'. $element->id.'.'.$request->file('image')->getClientOriginalExtension()])->save();

         }

        return redirect("/games/".$type_game->id."/elements");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(type_game $type_game,element $element)
    {

        unlink($element->image);
        $element->delete();

        return redirect("/games/".$type_game->id."/elements");
    }
}
