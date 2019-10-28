<?php
date_default_timezone_set('America/Mexico_City');
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

/*
  7 ROUTE CONVENTIONS

  GET /events -> index
  Route::get('/events', 'EventsController@index');

  GET /events/create -> create
  Route::patch('/events/create', 'EventsController@create');

  GET /events/1 -> show
  Route::get('/events/{event}', 'EventsController@show');

  POST /events -> store
  Route::post('/events', 'EventsController@store');

  GET /events/1/edit -> edit
  Route::patch('/events/{event}/edit', 'EventsController@edit');

  PATCH /events/1 -> update
  Route::patch('/events/{event}', 'EventsController@update');

  DELETE /events/1 -> destroy
  Route::delete('/events/{event}', 'EventsController@destroy');

  SUMMARIZE:
  Route::resource('events', 'EventsController');

*/

//Authentication requests
Route::get('/', 'AuthController@loginPage');
Route::get('/login', 'AuthController@loginPage');

//Events Request
Route::get('/events', 'EventsController@index');
Route::post('/events', 'EventsController@store');
Route::get('/events/{event}', 'EventsController@show');
Route::post('/events/edit', 'EventsController@update');
//Route::delete('/events/{event}', 'EventsController@destroy');
