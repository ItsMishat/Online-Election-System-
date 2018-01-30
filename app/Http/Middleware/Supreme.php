<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Supreme
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
        if (Auth::guard($guard)->guest() || !Auth::guard($guard)->user()->is_admin) 
        {
       
        return redirect('sorry');
        }
        else {
        return $next($request);
        }        
     
}
}