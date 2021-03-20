<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if (isset($_SESSION['id']) && $_SESSION['role'] == 2) {
            return redirect()->route('market');
        }
        return $next($request);
    }
}
