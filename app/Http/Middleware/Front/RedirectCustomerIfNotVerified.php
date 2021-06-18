<?php

namespace App\Http\Middleware\Front;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectCustomerIfNotVerified
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
        if (Auth::guard('customer')->user())
            if (!Auth::guard('customer')->user()->status)
                return redirect('/verify');
        return $next($request);
    }
}
