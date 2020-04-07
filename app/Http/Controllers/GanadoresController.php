<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Result;


class GanadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("ticket.ganadores");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function days_schedule($date)
    {
       
        $result = Result::join('elements','elements.id','=','results.element_win_id')
                        ->join('lotteries','lotteries.id','=','results.lottery_id')
                        ->join('schedules','schedules.id','=','results.schedules_id')
                        ->select('results.id','results.fecha','lotteries.name','schedules.iniitial_schedule','elements.description')
                        ->where('fecha',$date)
                        ->get();
        return $result;
    }
    public function lottery_winners( $dato)
    {
        $winners = DB::table('money_tickets')
                    ->join('customers','customers.id','=','money_tickets.customer_id')
                    ->select('money_tickets.name','money_tickets.description','money_tickets.iniitial_schedule','money_tickets.ticket_id','customers.identity_card','customers.firstname','customers.lastname','money_tickets.bet_value_id','money_tickets.pago_por_ticket','money_tickets.status')
                    ->where('money_tickets.id',$dato)
                    ->get();
        return $winners;
    }
    public function days_id($id)
    {
         $resultados = Result::select('element_win_id','lottery_id','schedules_id','fecha')
                        ->where('id',$id)
                        ->get();
        return $resultados;
    }
}
