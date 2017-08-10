<?php

namespace App\Http\Middleware;

use Closure;

class Ip
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
        if($request->ip() == '10'){
            printf('ip OK');
            return $next($request);
        } else {
            printf('ip NOT OK');
            return response('Unauthorized', 401);
        }
    
        
    }
}
