<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Postware
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
        if(Auth::check()){
            if(Auth::user()->hasRole('Postwriter')){
                return $next($request);
            } else if (Auth::user()->hasRole('Manager')){
                return $next($request);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/user/login');
        }
    }
}
