<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plays_ticket;
use Illuminate\Support\Facades\DB;


class ControllerOfTest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var = DB::table('plays_ticket')
                ->join('plays','plays.id','=','plays_ticket.play_id')
                ->select('plays_ticket.bet_element_id as elemento','sum(plays.bet_value_id) as total','count(plays_ticket.bet_element_id) as cantidad')
                ->groupBy('plays_ticket.bet_element_id')
                ->get();

        dd($var);
        return view('home')
            ->with("loterias",json_encode($loto));
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
}
