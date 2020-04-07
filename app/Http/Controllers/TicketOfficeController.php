<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
Use App\Ticket_office;
use App\Agency;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TicketOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth::user();

        //dd($user->role_id);
        if($user->role_id == 2){
               $ticket_Offices =  Ticket_office::join('agencies', 'agencies.id', '=', 'ticket_offices.agency_id')
                                                ->select('ticket_offices.id','ticket_offices.agency_id','ticket_offices.status' ,'ticket_offices.descripcion','agencies.name')
                                                ->where('ticket_offices.agency_id', '=', $user->agency_id)
                                                ->get();
            }else{
                $ticket_Offices = Ticket_office::join('agencies', 'agencies.id', '=', 'ticket_offices.agency_id')
                                                                ->select('ticket_offices.id','ticket_offices.agency_id','ticket_offices.status' ,'ticket_offices.descripcion','agencies.name')
                                                                ->get();

            }
        return view("ticketoffice.office.index",[
                                "user" =>Auth::user(),
                                "users" => User::all(),
                                "events" => Event::all()->where("user",Auth::id()),
                                "menus" => $user->access_list(),
                                "ticket_Offices" => $ticket_Offices,
                                "Agency" => Agency::all()
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $ticket_Offices= new Ticket_Office();
       $user = Auth::user();
       if(($user->role_id != 2) ||($user->role_id!=3) ){
       $data = $request;
         $ticket_Offices->descripcion = $data["descripcion"];
         $ticket_Offices->agency_id = $data["agency"];
         $ticket_Offices->status = $data["status"];
         $ticket_Offices->save();
          return redirect("/taquillas/office");
       }

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
        $user = Auth::user();
        $edit = Ticket_Office::findOrFail($id);
        $data = $request;
            if($user->role_id == 2){
                $id = $user->agency_id;
            }else{
                $id = $data["agency"];
            }
         $edit->descripcion = $data["descripcion"];
         $edit->agency_id = $id;
         $edit->status = $data["status"];
         $edit->save();
          return redirect("/taquillas/office");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if(($user->role_id != 2) ||($user->role_id!=3) ){
        $elim = Ticket_Office::findOrFail($id);
        $elim->delete();
        return redirect("/taquillas/office");
        }
    }

}
