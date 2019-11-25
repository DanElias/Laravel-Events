<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use Validator;

class EventAPI extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return response()->json(Event::get(), 200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return response()->json(['message' => "Not yet implemented!"], 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $rules = [
      'nombre' => 'required|min:3',
      'siglas' => 'required|min:1',
      'duracion' => 'required|min:3|numeric',
      'limiteAsistentes' => 'required|min:3|numeric',
    ];

    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    } else {
      $event = Event::create($request->all());
      return response()->json($event, 201);
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
        $event = Event::find($id);
        if(is_null($event)){
          return response()->json(['message' => "Record not found!"], 404);
        }
        return response()->json($event, 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      return response()->json(['message' => "Not yet implemented!"], 200);
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
      return response()->json(['message' => "Not yet implemented!"], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      return response()->json(['message' => "Not yet implemented!"], 200);
  }
}
