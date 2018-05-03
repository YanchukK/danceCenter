<?php

namespace App\Http\Middleware;

use Closure;

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
        $check = $request->user()->middleware;
        if ($check == $admin || $check == $customer || $check == $teacher) {
            return $next($request);
        }

        return redirect('/');
    }
}
