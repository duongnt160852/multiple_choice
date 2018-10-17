<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth as Auth;
use Closure;

class admin
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
        if (Auth::guard('admins')->check()){
            return redirect()->route("test");
        }
        return $next($request);
    }
}
