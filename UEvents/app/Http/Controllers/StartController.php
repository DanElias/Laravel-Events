<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
  public function index(){
    $context = [
      'title' => 'UEvents | Inicio',
      'info' => 'Data',
      'error' => false,
      'success' => false,
      'errorMessage'  => '',
      'successMessage'  => '',
    ];

    return view('start', $context);
  }
}
