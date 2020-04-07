<?php

namespace App\Http\Controllers;

use App\Agency;
use App\User;
use App\Event;
use App\Lottery;
Use App\Ticket_office;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
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
        if (($user->role_id == 2))
       {
            $agency = Agency::where('id','=',$user->agency_id)->get();
       }else{
            $agency = Agency::all();
       }
       //dd($agency);
         return view("agency.list",[
            "user" =>Auth::user(),
            "agencies" => $agency,
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
       if (!($user->role_id == 2) || !($user->role_id ==3))
       {
            return view("agency.new",[
                "user" => Auth::user(),
                "agencies" => Agency::all(),
                "users" => User::all(),
                "lotto" => Lottery::all(),
                "events" => Event::all()->where("user",Auth::id()),
                "menus" => $user->access_list()
            ]);
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!($user->role_id == 2) || !($user->role_id ==3))
       {
            $data = $request;

            $new = new Agency();
            $new->name = $data["name"];
            $new->phone = $data["phone"];
            $new->rif = $data["rif"];
            $new->percentage_profit = $data["percentage_profit"];
            $new->address = $data["address"];

            $new->save();
            $new->lotteries_agencys()->attach($data["loteria"]);

            //Falta colocar aca los menus que tendra el afiliado!

            // End Here

            return redirect("/agencies");
       }
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
        $edit = Agency::findOrFail($id);
        $user = Auth::user();
        $user_agency = User::join('roles','roles.id','=','users.role_id')
                            ->select('users.firstname','users.lastname','roles.name')
                            ->where('users.agency_id','=',$id)
                            ->get();
        $ticketoffice_agency = Ticket_office::select('descripcion', 'status')
                                        ->where('agency_id','=',$id)
                                        ->get();

         return view("agency.edit",[
            "edit" => $edit,
            "user" => $user,
            "users" => User::all(),
            "agencies" => Agency::all(),
            "lotto" => Lottery::all(),
            "agency_lottery"=> $edit->lotteries_agencys()->get(),
            "events" => event::all()->where("user",Auth::id()),
            "taquillas" => $ticketoffice_agency,
            "usuarios" => $user_agency,
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
        $user = Auth::user();
        $data = $request;

        $agency = Agency::findOrFail($id);
        $lottery = Lottery::all();

        $agency->name = $data["name"];
        $agency->phone = $data["phone"];
        $agency->rif = $data["rif"];
        $agency->percentage_profit = $data["percentage_profit"];
        $agency->address = $data["address"];
        $agency->save();
        foreach($lottery as $item){
            $agency->lotteries_agencys()->detach($item->id);
        }
        foreach($data["loteria"] as $item){
            $agency->lotteries_agencys()->attach($item);
        }
        return redirect("/agencies");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!($user->role_id == 2) || !($user->role_id ==3))
       {
            $agency = Agency::findOrFail($id);
            $agency->lotteries_agencys()->detach();
            $agency->delete();

            return redirect("/agencies");
       }
    }
}
