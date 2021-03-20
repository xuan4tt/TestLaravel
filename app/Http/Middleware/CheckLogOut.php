<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogOut
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
        if(!isset($_SESSION['id'])){
            return redirect()->route('index');
        }
        return $next($request);
    }
}
