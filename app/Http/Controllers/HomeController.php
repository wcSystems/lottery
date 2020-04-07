<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Play;
use App\Element;
use App\Ticket;
use App\Type_game;
use App\Agency;
use App\User;
use App\Lottery;
use App\Plays_ticket;
use App\Schedule;
use App\Box;
use App\Schedules_setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $date = Carbon::now();

                    $total_loterias = DB::table('plays_days')->select([DB::raw('count(id) as `count`'),DB::raw('DATE(created_at) as day')])
                                    ->groupBy('day')
                                    ->where('created_at', '>=', $date->subWeeks(1))
                                    ->get();
                                    $output = [];
                                    foreach($total_loterias as $key=>$value) {
                                        array_push($output,[$key,$value->count]);
                                    }

                    $elementos_plays = DB::table('animals_played')
                            ->join('elements','animals_played.bet_element_id','=','elements.id')
                            ->join('full_tickets','full_tickets.ticket_id','=','animals_played.ticket_id')
                            ->select(
                                      'animals_played.bet_element_id','elements.description',DB::raw('ROUND(SUM(animals_played.bet_value_id),2)as bet_value_id'),DB::raw('COUNT( animals_played.bet_element_id)as contador_elements'),
                                      DB::raw('ROUND(SUM(full_tickets.total),2)as total'),DB::raw('COUNT( DISTINCT animals_played.ticket_id)as contador_ticket')
                                    )
                            ->groupBy('animals_played.bet_element_id')
                            ->where('animals_played.type_game_id', '=','3')
                            ->get();

                    $agency = DB::table('agencies_ticketoffices')
                            ->select('name',DB::raw('ROUND(SUM(values_total),2)as recaudado'))
                            ->groupBy('id')
                            ->orderBy(DB::raw('ROUND(SUM(values_total),2)'),'desc')
                            ->take(4)
                            ->get();
                    $datos = DB::table('agencies_ticketoffices')
                            ->select(DB::raw('ROUND(SUM(values_total),2)as recaudo_master'))
                            ->get();


                    $ticket_office = DB::table('agencies_ticketoffices')
                                    ->select('name as agencia','descripcion as name',DB::raw('ROUND(values_total,2) as recaudado'))
                                    ->groupBy('ticket_offices_id')
                                    ->orderBy('values_total','desc')
                                    ->take(4)
                                    ->get();

                    $deuda_afiliado = DB::table('master_utilities')
                                      ->select('name as agencia','total_master')
                                      ->orderBy('total_master','desc')
                                      ->get();
                    //dd($deuda_afiliado);



        return view('home')
        ->with("elementos",json_encode($elementos_plays))
        ->with("agencias",json_encode($agency))
        ->with("ticketoffice",json_encode($ticket_office))
        ->with("contra",json_encode($datos))
        ->with("deuda",json_encode($deuda_afiliado))
        ->with("venta",json_encode($output)); 
    }
}
