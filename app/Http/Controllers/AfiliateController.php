<?php

namespace App\Http\Controllers;

use App\Event;
use App\Menu;
use App\Sub_menu;
use App\Ticket_office;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AfiliateController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view("afiliate.list",[
            "user" =>Auth::user(),
            "users" => User::all()->where("role_id","=",2),
            "events" => Event::all()->where("user",Auth::id()),
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
        return view("afiliate.new",[
            "user" => Auth::user(),
            "users" => User::all(),
            "events" => Event::all()->where("user",Auth::id()),
            "menus" => $user->access_list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "doc" => "required|min:8|unique:users",
            "password" => "required|min:8",
            "email" => "required|email|unique:users,email",
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        $new = new User();
        $new->firstname = $data["firstname"];
        $new->lastname = $data["lastname"];
        $new->email = $data["email"];
        $new->doc = $data["doc"];
        $new->password = Hash::make($data["password"]);
        $new->role_id = 2;
        $user = Auth::user();
        $new->master = $user->id;
        $new->save();
        $access = [
            0 => "7",
            1 => "8",
            2 => "4",
            3 => "5"
        ];
        $new->sub_menus()->attach($access);


        //IMAGE
        if($request->file('profile')) {
            $path = Storage::disk('public')->put('img/upload/users', $request->file('profile'));
            $new->fill(['profile' => $path])->save();
        }
        return redirect("/afiliates");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::findOrFail($id);
        $user = Auth::user();


        return view("afiliate.edit",[
            "edit" => $edit,
            "user" => $user,
            "users" => User::all(),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "doc" => "required|min:8",
            "email" => "required|email"
        ]);

        $user = User::findOrFail($id);

        $user->firstname = $data["firstname"];
        $user->lastname = $data["lastname"];
        $user->doc = $data["doc"];
        $user->email = $data["email"];

        $user->save();

         //IMAGE
         if($request->file('profile')) {
            $path = Storage::disk('public')->put('img/upload/users', $request->file('profile'));
            $user->fill(['profile' => $path])->save();
        }

        return redirect("/afiliates");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/afiliates");
    }

}
