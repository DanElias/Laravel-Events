<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function loginPage(){
    $context = [
      'title' => 'UEvents | Login',
      'info' => 'Data',
      'error' => false,
      'success' => false,
      'errorMessage'  => '',
      'successMessage'  => '',
    ];
      return view('login', $context);
    }

}
