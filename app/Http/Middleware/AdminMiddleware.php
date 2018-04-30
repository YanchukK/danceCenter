<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1, $role2)
    {
        dd($role1 . $role2);
        if(Auth::user()->middleware == '1a') {
            return $next($request);
        }
        dd('df');
        return redirect('/');
    }
}
