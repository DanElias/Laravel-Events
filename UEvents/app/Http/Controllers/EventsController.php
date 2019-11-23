<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use Auth;

class EventsController extends Controller
{

    public function index(){
      $events = Event::all();

      $options = $events;

      $context = [
        'options' => $options,
        'title' => 'UEvents | Eventos',
        'info' => 'Data',
        'error' => false,
        'success' => false,
        'errorMessage'  => '',
        'successMessage'  => '',
      ];

      return view('events', $context);
    }

    public function create(){}

    public function show($id){
      $event = DB::table('events')->where('idEvento', $id)->first();
      return json_encode($event);
    }

    public function store(){
      $event = new Event();
      $event->nombre = request('nameEvent');
      $event->idAdmin = Auth::id();
      $event->siglas = request('siglasEvent');
      $event->fecha = request('dateEvent');
      $event->duracion = request('durationEvent');
      $event->limiteAsistentes = request('asistantsEvent');
      $event->costo = request('costEvent');
      $event->lugar = request('locationEvent');
      $event->descripcion = request('descriptionEvent');
      $event->created_at = date('Y-m-d H:i:s');
      $event->updated_at = date('Y-m-d H:i:s');
      $event->save();

      $events = Event::all();
      $options = $events;
      $context = [
        'options' => $options,
        'title' => 'UEvents | Eventos',
        'info' => 'Data',
        'error' => false,
        'success' => true,
        'errorMessage'  => '',
        'successMessage'  => 'El evento ha sido guardado',
      ];

      return view('events', $context);

    }

    public function edit($id){

    }

    public function update(){
      $id = request('eventIdE');
      $event = Event::find($id);
      $event->nombre = request('nameEventE');
      //$event->idAdmin = 1 ; //TO-DO -> GET CURRENT USER ID
      $event->siglas = request('siglasEventE');
      $event->fecha = request('dateEventE');
      $event->duracion = request('durationEventE');
      $event->limiteAsistentes = request('asistantsEventE');
      $event->costo = request('costEventE');
      $event->lugar = request('locationEventE');
      $event->descripcion = request('descriptionEventE');
      $event->updated_at = date('Y-m-d H:i:s');
      $event->save();

      $events = Event::all();
      $options = $events;
      $context = [
        'options' => $options,
        'title' => 'UEvents | Eventos',
        'info' => 'Data',
        'error' => false,
        'success' => true,
        'errorMessage'  => '',
        'successMessage'  => 'El evento ha sido guardado',
      ];

      return view('events', $context);
    }

    public function destroy(Event $id){

    }
}
