<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
       
        if ($guard == "agentr" && Auth::guard($guard)->check()) {
            return redirect('/agentr');
        }
        if ($guard == "client" && Auth::guard($guard)->check()) {
            return redirect('/client');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}