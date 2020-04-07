<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\Event;
use App\Lottery;
use App\Type_game;
use App\User;
use App\Agency;
use App\Schedule;
use App\Box;
use App\Play;
use App\Customer;
use App\Plays_ticket;
use App\Element;

use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("ticket.index");
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
        //
        //return $request;
        //dd($request);

         $data = $request->all();

          if($data['cliente']['id'] === null || $data['cliente']['id'] === ''){
            $insert_customer = new Customer();
            $insert_customer->identity_card = $data['cliente']['cedula'];
            $insert_customer->firstname = $data['cliente']['nombre'];
            $insert_customer->lastname = $data['cliente']['apellido'];
            $insert_customer->phone = $data['cliente']['telefono'];
            $insert_customer->address = $data['cliente']['direccion'];
            //Guardamos el cambio en nuestro modelo
            $insert_customer->save();

            $id = $insert_customer->id;

        }else{

               $id = $data['cliente']['id'];
        }

            $ticket = new Ticket();
            $ticket->description = $data['cliente']['cedula'];
            $ticket->ticket_office_id = 1;
            $ticket->customer_id = $id;
            $ticket->datetime = now();
            $ticket->save();
            $valor_code = Ticket::findOrFail($ticket->id);
             $valor_code->code = '000'.$ticket->id;
             $valor_code->save();



            foreach($data['jugada'] as $item){

                $play = new Play();
                $play->lottery_id = $item['loteria_id'];
                $play->bet_value_id =  $item['amount'];
                $play->date = date('Y-m-d');
                $play->save();
                foreach ($item['jugadas'] as $key) {
                    $play_ticket = new Plays_ticket;
                    $play_ticket->play_id = $play->id;
                    $play_ticket->ticket_id = $ticket->id;
                    $play_ticket->bet_element_id =  $key['elementos'];
                    $play_ticket->bet_schedule_id =  $key['horarios_id'];
                    $play_ticket->save();
                }


            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $ticket)
    {
        //
    }

    public function vlotteries()
    {
        $user = Auth::user();
        if (($user->role_id == 2)||($user->role_id == 3))
        {
                $lottery = Lottery::join('agency_lottery','agency_lottery.lottery_id','=','lotteries.id')
                                    ->select('lotteries.id','lotteries.name','lotteries.image')
                                    ->where('agency_lottery.agency_id','=',$user->agency_id)->get();
        }else{
                $lottery = Lottery::all();
        }
        return  $lottery;
    }
    public function vlottery($id)
    {
        $date = new \DateTime();
        $hora =$date->format('H');
        
        $schedules = Lottery::find($id)->schedules()->where('schedule_id','>',$hora)->get();
        $type_games = Lottery::find($id)->type_games()->get();


        $resp = ['schedules' => $schedules,'type_games' => $type_games];

        return $resp;
    }
    public function velements()
    {
        return Element::All();
    }
    public function animalitos()
    {
        return Element::all()->where('type_game_id','=','3');
    }
    public function type_game($id)
    {
        $type_games = Box::select('id')->where('lottery_id',$id)->get();
        return $type_games;
    }
    public function zodiacos()
    {
        return Element::all()->where('type_game_id','=','2');
    }

}
