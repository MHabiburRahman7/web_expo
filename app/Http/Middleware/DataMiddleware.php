<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;

class DataMiddleware
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
        if ($request->user()->status_id == 1)
        {
            return redirect('/profile');
        }
        return $next($request);
    }
}
