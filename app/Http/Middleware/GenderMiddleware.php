<?php

namespace App\Http\Middleware;

use Closure;

class GenderMiddleware
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
            if(Auth::user()->role != 'User'){
                Auth::logout();
                return redirect('/register');
            }
            return $next($request);
    }
}
