<?php

namespace App\Http\Middleware;

use Closure;

class RevokePaymentMiddleware
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
        if ($request->user()->status_id != 2)
        {
            abort(403);
        }
        return $next($request);
    }
}
