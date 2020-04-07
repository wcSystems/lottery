<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = Customer::get();
        return $customer;
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

    public function search(Request $request)
    {
        $identity = $request->cedula;

        return $identitys= Customer::where('identity_card','like','%'.$identity.'%')->get();
    }

    public function identity()
    {
        $cedulas = Customer::select('identity_card')->get();
        return $cedulas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        //
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

               $id=$data['cliente']['id'];
        }
        return $id;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
        foreach ($variable as $key => $value) {
            # code...
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
