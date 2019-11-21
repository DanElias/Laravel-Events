<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Staff
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
      if (Auth::check() && (Auth::user()->role == 'staff' || Auth::user()->role == 'admin' ) ) {
          return $next($request);
      }
      elseif (Auth::check() && Auth::user()->role == 'user') {
          return redirect('/');
      }
      else {
          return redirect('/');
      }
    }
}
