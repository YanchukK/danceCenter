<?php

namespace App\Http\Middleware;

use App\Customer;
use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
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
        $customer = new Customer();
        dd(Auth::user());
        if( $customer->has('middleware') && $customer->middleware === 3 ) {
            dd('you are customer!'); //todo fdddddddddddddddddd
            return redirect()->route('customer');
        }
        return $next($request);
    }
}
