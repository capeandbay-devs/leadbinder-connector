<?php

namespace CapeAndBay\LeadBinder\TrapperKeeper\Http\Middleware;

use Closure;

class CheckForAccessToken
{
    public function handle($request, Closure $next)
    {
        if(!session()->has('leadbinder-jwt-access-token'))
        {
            return redirect('/access');
        }

        return $next($request);
    }
}
