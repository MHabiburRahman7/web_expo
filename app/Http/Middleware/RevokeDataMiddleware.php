<?php

namespace App\Http\Middleware;

use Closure;

class RevokeDataMiddleware
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
        if ($request->user()->status_id != 1)
        {
            abort(403);
        }
        return $next($request);
    }
}
