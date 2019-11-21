<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = redirectTo( );
    protected function redirectTo( ) {
      if (Auth::check() && Auth::user()->role == 'user') {
          Auth::logout();
          return('/');
      }
      elseif (Auth::check() && Auth::user()->role == 'staff') {
          return('/start');
      }
      elseif (Auth::check() && Auth::user()->role == 'admin') {
          return('/start');
      }
      else {
          return('/');
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
