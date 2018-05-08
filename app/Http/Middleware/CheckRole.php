<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $admin = '', $customer = '', $teacher = '')
    {
        if ( !Auth::check() ) {
            return redirect('/');
        }

        $check = $request->user()->middleware;
        if ( $check == $admin || $check == $customer || $check == $teacher ) {
            return $next($request);
        }

        return redirect('/');
    }
}
