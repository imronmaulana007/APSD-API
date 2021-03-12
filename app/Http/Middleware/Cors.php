<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        return $next($request)
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Origin', "http://localhost:8081")
            // ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', "GET, POST, PUT, PATCH, DELETE, OPTIONS")
            ->header('Access-Control-Allow-Headers', "Origin,  X-Auth-Token, Accept,Authorization,Content-Type"); 
            // ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Auth-Token, Authorization'); 
    }
}
