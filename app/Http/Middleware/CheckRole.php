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
    //На будущее: параметры нужно называть не админ, кастомер и т.д. А именно их порядок. т.е. Первый, второй. И в проверке писать "если  первый == админ, второй кастомер"
    public function handle($request, Closure $next, $admin = '', $customer = '', $teacher = '', $guest = '')
    {
        if ( !Auth::check() ) {
            if( Auth::guest() && $customer == 'guest') { // вот почему нужно делать так. как описано выше.
                return $next($request);
            }
            return redirect('/');
        }

        $check = $request->user()->middleware;
        if ( $check == $admin || $check == $customer || $check == $teacher) {
            return $next($request);
        }

        return redirect('/');
    }
}
