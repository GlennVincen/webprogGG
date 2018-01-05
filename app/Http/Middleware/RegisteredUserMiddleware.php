<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RegisteredUserMiddleware
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
        if(Auth::user() == null){
            return redirect('/home');
        }
        return $next($request);
    }
}
