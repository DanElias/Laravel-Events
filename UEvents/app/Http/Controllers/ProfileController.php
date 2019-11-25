<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $context = [
          'user' => $user,
          'title' => 'UEvents | Perfil',
          'info' => 'Data',
          'error' => false,
          'success' => false,
          'errorMessage'  => '',
          'successMessage'  => '',
        ];

        return view('profile', $context);

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

    public function update(){
      $id = request('userId');
      $user = User::find($id);
      $user->username = request('username');
      $user->email = request('email');
      $user->nombre = request('name');
      $user->a_paterno = request('sfather');
      $user->a_materno = request('smother');
      $user->fecha_nacimiento = request('birthday');
      $user->estado = request('state');
      $user->empresa = request('company');
      $user->updated_at = date('Y-m-d H:i:s');
      $user->save();

      $user = User::find($id);
      $context = [
        'user' => $user,
        'title' => 'UEvents | Perfil',
        'info' => 'Data',
        'error' => false,
        'success' => true,
        'errorMessage'  => '',
        'successMessage'  => 'Tu perfil ha sido actualizado y guardado',
      ];

      return view('profile', $context);
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
