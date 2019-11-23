<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
     {
       //Auth::logout();

       if (Auth::user()->role == "admin"  ) {
           return $next($request);
       }
       elseif (Auth::check() && Auth::user()->role == "staff") {
           return redirect('/start');
       }
       else {
           return redirect('/start');
       }
     }
}
