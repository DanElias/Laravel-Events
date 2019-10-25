<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
      $options = [
        'option 1',
        'option 2',
        'option 3',
      ];

      $context = [
        'options' => $options,
        'title' => 'UEvents | Login',
        'info' => 'Data',
      ];

      return view('login', $context);
    }
    //
}
