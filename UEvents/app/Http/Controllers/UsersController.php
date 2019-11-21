<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
  public function index(){
    $users = User::all();

    $options = $users;

    $context = [
      'options' => $options,
      'title' => 'UEvents | Usuarios',
      'info' => 'Data',
      'error' => false,
      'success' => false,
      'errorMessage'  => '',
      'successMessage'  => '',
    ];

    return view('users', $context);
  }

  public function create(){}

  public function show($id){
    $user = DB::table('users')->where('id', $id)->first();
    return json_encode($user);
  }

  public function store(){
    $user = new User();
    $user->username = request('username');
    $user->email = request('email');
    $user->created_at = date('Y-m-d H:i:s');
    $user->updated_at = date('Y-m-d H:i:s');
    $user->save();

    $users = User::all();
    $options = $users;
    $context = [
      'options' => $options,
      'title' => 'UEvents | Usuarios',
      'info' => 'Data',
      'error' => false,
      'success' => true,
      'errorMessage'  => '',
      'successMessage'  => 'El usuario ha sido creado',
    ];

    return view('users', $context);

  }

  public function edit($id){

  }

  public function update(){
    $id = request('userIdE');
    $user = User::find($id);
    $user->username = request('usernameE');
    $user->updated_at = date('Y-m-d H:i:s');
    $user->save();

    $users = User::all();
    $options = $events;
    $context = [
      'options' => $options,
      'title' => 'UEvents | Usuarios',
      'info' => 'Data',
      'error' => false,
      'success' => true,
      'errorMessage'  => '',
      'successMessage'  => 'El usuario ha sido actualizado',
    ];

    return view('users', $context);
  }

  public function destroy(User $id){

  }
}
