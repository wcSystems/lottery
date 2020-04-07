<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Auth::routes();

//Rutas Base
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get("/logout", "SesionController@logout");
//End Rutas Base


//Rutas Calendar
Route::put("/calendar/event/add","EventController@store");
//End Rutas calendar

//Rutas Mailing
Route::put("/home/mail/send","MailController@store");
Route::get("/mail/inbox","MailController@inbox");
Route::get("/mail/outbox","MailController@outbox");
//End Rutas Mailing

//Usuarios
Route::resource("/users","UserController");
Route::get("/usuarios","UserController@usuarios");
Route::get("/menus","UserController@menus");
Route::get("/userauth","UserController@userauth");

//Taquillas
Route::resource("/taquillas/office","TicketOfficeController");


//Agencias
//Route::resource("/agencies","AgencyController");
Route::get("/agencies","AgencyController@index");
Route::get("/agencies/new","AgencyController@create");
Route::put("/agencies/new/create","AgencyController@store");
Route::get("/agencies/{id}","AgencyController@edit");
Route::put("/agencies/{id}/update","AgencyController@update");
Route::get("/agencies/{id}/remove","AgencyController@destroy");
//End Rutas Agencias

//Rutas Afiliados
Route::get("/afiliates","AfiliateController@index");
Route::get("/afiliates/new","AfiliateController@create");
Route::put("/afiliates/new/create","AfiliateController@store");
Route::get("/afiliates/{id}","AfiliateController@edit");
Route::put("/afiliates/{id}/update","AfiliateController@update");
Route::get("/afiliates/{id}/remove","AfiliateController@destroy");
//End Rutas Afiliados

//Rutas Para Gestion de Taquilla
/* Route::get("/taquilla/users","TicketOfficeController@index");
Route::put("/taquilla/users/access/new","TicketOfficeController@subuser");
Route::put("/taquilla/users/{id}/update","TicketOfficeController@update");
Route::get("/taquilla/users/{id}/remove","TicketOfficeController@destroy"); */
//End Taquilla

//Rutas Para Gestion de Juegos
Route::get("/games","TypeGameController@index");
Route::get("/games/new","TypeGameController@create");
Route::put("/games/new/create","TypeGameController@store");
Route::get("/games/{type_game}","TypeGameController@edit");
Route::put("/games/{type_game}/update","TypeGameController@update");
Route::get("/games/{type_game}/remove","TypeGameController@destroy");
//End Juegos

//Rutas para manejar los elementos DERIVA de Juegos
Route::get("/games/{type_game}/elements","ElementController@index");
Route::get("/games/{type_game}/elements/new","ElementController@create");
Route::put("/games/{type_game}/elements/new/create","ElementController@store");
Route::get("/games/{type_game}/elements/{element}/edit","ElementController@edit");
Route::put("/games/{type_game}/elements/{element}/update","ElementController@update");
Route::get("/games/{type_game}/elements/{element}/remove","ElementController@destroy");
//End Elementos

//Rutas para manejar los diseños y modelos de loterias
Route::resource("/lotteries","LotterieController");
Route::put("/lotteries/new/lottery","LotterieController@schedule_play");
Route::get("/horarios","LotterieController@horarios");
Route::get("/juegos","LotterieController@juegos");
Route::get("/loterias","LotterieController@loterias");
Route::get("/check_juegos/{id}","LotterieController@check_juegos");
Route::get("/check_horarios/{id}","LotterieController@check_horarios");
//End lotteries

//Play
Route::resource("/play","PlayController");
//End Play

//Tickets
Route::resource("/tickets","TicketController");
Route::get("/vlotteries","TicketController@vlotteries");
Route::get("/vlottery/{id}","TicketController@vlottery");
Route::get("/velements","TicketController@velements");
Route::get("/animalitos","TicketController@animalitos");
Route::get("/zodiacos","TicketController@zodiacos");
Route::get("/type_game/{id}","TicketController@type_game");
//End Tickets

//Customer
Route::get('customer/identity', 'CustomerController@identity');
Route::resource('/customer','CustomerController');
Route::get('customer/search/{cedula}', 'CustomerController@search');


//Ganadores
Route::resource("/ganadores","GanadoresController");
Route::get('/ganadores/days_schedule/{date}',"GanadoresController@days_schedule");
Route::get('/lottery_winners/{data}','GanadoresController@lottery_winners');
Route::get('/days_id/{id}','GanadoresController@days_id');