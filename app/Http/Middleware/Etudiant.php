<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Etudiant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      //  return $next($request);
      if (!Auth::check()) {
        return redirect()->route('login');
    }

    

    if (Auth::user()->role == 'encadrant') {
        return $next($request);
    }

    if (Auth::user()->role == 'etudiant') {
        return redirect()->route('etudiant');
    }
    }
}
