<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Member
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
        if(!Auth::check())
        {
            return redirect('/user/login');
        }
        else if(Auth::check())
        {
            if(Auth::user()->hasRole('Manager'))
            {
                return $next($request);
            }
            else
            {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
