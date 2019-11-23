<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(Request $request)
  {
      $request->validate([
          'username' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'role' =>  ['required'], //validate role input
      ]);
  }

  public function store(Request $request){

    $request->validate([
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' =>  ['required'], //validate role input
    ]);

    $user = new User();
    $user->username = request('username');
    $user->email = request('email');
    $user->role = request('role');
    $user->password = Hash::make(request('password'));
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

  public function update(Request $request){

    validator($request);

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
