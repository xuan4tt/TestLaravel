<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
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
        if (isset($_SESSION['id']) && $_SESSION['role'] == 1) {
            return redirect()->route('admin');
        }
        return $next($request);
    }
}
