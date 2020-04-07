<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Event;
use App\Menu;
use App\Agency;
use App\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 3){
            $users = User::leftJoin('agencies', 'agencies.id', '=', 'users.agency_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.id','users.firstname', 'users.lastname', 'users.profile','users.master','agencies.name as agencia','roles.name as rol')
            ->where('users.id',Auth::user()->id)
            ->get();
        }elseif(Auth::user()->role_id == 1 || Auth::user()->role_id == 4 ){
            $users = User::leftJoin('agencies', 'agencies.id', '=', 'users.agency_id')
                ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
                ->select('users.id','users.firstname', 'users.lastname', 'users.profile','users.master','agencies.name as agencia','roles.name as rol')
                ->get();
        }else{
            $users = User::leftJoin('agencies', 'agencies.id', '=', 'users.agency_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.id','users.firstname', 'users.lastname', 'users.profile','users.master','agencies.name as agencia','roles.name as rol')
            ->where('users.master',Auth::user()->id)
            ->orWhere('users.id',Auth::user()->id)
            ->get();
        }
        return view("user.index",[
            "user" =>Auth::user(),
            "users" => $users,
            "events" => Event::all()->where("user",Auth::id()),
            "menus" => Auth::user()->access_list(),
            "user_all" => User::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id == 3){
            return redirect('/users');
        }elseif (Auth::user()->role_id == 1){
            $user_afiliado = User::all()->whereIn('role_id', [2,3]);
            $agency = Agency::all();
            $roles = Role::all()->whereIn('id', [1,2,3]);
        }elseif(Auth::user()->role_id == 2){
            $user_afiliado = User::all()->whereIn('role_id', [2])->where('agency_id', Auth::user()->agency_id);
            $agency = Agency::all()->where('id', Auth::user()->agency_id);
            $roles = Role::all()->whereIn('id', [2,3]);
        }else{
            $user_afiliado = User::all()->whereIn('role_id', [1,2]);
            $agency = Agency::all();
            $roles = Role::all();
        }

        $menus = Menu::all();
        foreach ($menus as $item){
            $item->hijos = $item->sub_menus()->get();
        }
        $user = Auth::user();
        return view("user.create",[
            "user" => Auth::user(),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => $user->access_list(),
            "acceso" => $menus,
            "role_id" => Auth::user()->role_id,
            "agency" => $agency,
            "user_afiliado" => $user_afiliado,
            "roles" => $roles
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
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email|unique:users,email",
            "doc" => "required|unique:users",
            "password" => "required|min:8",
            'profile' => 'required'
            //"access" => "required"
        ]);
        $user = new User();
        $user->firstname = $data["firstname"];
        $user->lastname = $data["lastname"];
        $user->email = $data["email"];
        $user->doc = $data["doc"];
        $user->password = Hash::make($data["password"]);
        $user->agency_id = $request->get('agency_id');
        $user->master = $request->get('master');
        $user->role_id = $request->get('role_id');

        $user->status = 1;
        $user->save();
        if(Auth::user()->role_id == 1){
            $user->sub_menus()->attach($request->access);
        }
        if($request->file('profile')) {
            $request->file('profile')->move('img/upload/users', $user->doc.'.'.$request->file('profile')->getClientOriginalExtension());
            //$path = Storage::disk('public')->put('img/upload/users', $request->file('profile'));
            $user->fill(['profile' => 'img/upload/users/'.$user->doc.'.'.$request->file('profile')->getClientOriginalExtension()])->save();
        }
        return redirect('/users');
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
       // $buscar = User::find($id);
        if (Auth::user()->role_id == 3 && Auth::user()->id != $id){
            return redirect('/users');
        }elseif(Auth::user()->role_id == 2 && User::find($id)->master != Auth::user()->id && Auth::user()->id != $id){
            return redirect('/users');
        }elseif (Auth::user()->role_id == 1){
            $user_afiliado = User::all()->whereIn('role_id', [1,2]);
            $agency = Agency::all();
            $roles = Role::all()->whereIn('id', [1,2,3]);
        }elseif(Auth::user()->role_id == 2 && Auth::user()->id == $id){
            $user_afiliado = User::all()->where('id', Auth::user()->master);
            $agency = Agency::all()->where('id', Auth::user()->agency_id);
            $roles = Role::all()->whereIn('id', [2,3]);
        } elseif(Auth::user()->role_id == 2){
            $user_afiliado = User::all()->whereIn('role_id', [2])->where('agency_id', Auth::user()->agency_id);
            $agency = Agency::all()->where('id', Auth::user()->agency_id);
            $roles = Role::all()->whereIn('id', [2,3]);
        }elseif(Auth::user()->role_id == 3){
            $user_afiliado = User::all()->where('id', Auth::user()->master);
            $agency = Agency::all()->where('id', Auth::user()->agency_id);
            $roles = Role::all()->whereIn('id', [3]);
        }
        else{
            $user_afiliado = User::all()->whereIn('role_id', [1,2]);
            $agency = Agency::all();
            $roles = Role::all();
        }

        $menus = menu::all();
        foreach ($menus as $item){
            $item->hijos = $item->sub_menus()->get();
        }
        return view("user.edit",[
            "user" => Auth::user(),
            "events" => event::all()->where("user",Auth::id()),
            "menus" => Auth::user()->access_list(),
            "acceso" => $menus,
            "check" => Role::find(Auth::user()->role_id)->sub_menus()->get(),
            "edit" => User::find($id),
            "role_id" => Auth::user()->role_id,
            "agency" => $agency,
            "user_afiliado" => $user_afiliado,
            "roles" => $roles
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
        $data = $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",
            "doc" => "required",
            "password" => "required|min:8",
            //"access" => "required"
        ]);
        $user = User::findOrFail($id);
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->doc = $request->get('doc');
        $user->password = Hash::make($request->get('password'));
        $user->agency_id = $request->get('agency_id');
        $user->master = $request->get('master');
        $user->role_id = $request->get('role_id');
        $user->status = 1;
        $user->save();
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 4){
            $user->sub_menus()->sync($request->access);
        }
        if($request->file('profile')) {
            $request->file('profile')->move('img/upload/users', $user->doc.'.'.$request->file('profile')->getClientOriginalExtension());
            //$path = Storage::disk('public')->put('img/upload/users', $request->file('profile'));
            $user->fill(['profile' => 'img/upload/users/'.$user->doc.'.'.$request->file('profile')->getClientOriginalExtension()])->save();
        }
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->sub_menus()->detach();
        $user->delete();
        return redirect('/users');
    }
}
