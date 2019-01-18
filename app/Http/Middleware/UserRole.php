<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      if (Auth::guard($guard)->check() && $request->user()->role() == 'User' ) {
        return $next($request);
      }

      return redirect('/admin');
    }
}
