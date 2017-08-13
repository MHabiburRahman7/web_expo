<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\User;

class SharedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('guard')->check()) {
        $user = User::where('id', Auth::user()->id)->first();
        $profile = $user->profile()->first();
        $kompetisi = $user->kompetisi()->first();
        View::share('kompetisi',$kompetisi);
        View::share('profile',$pro);
        }
        return $next($request);
    }
}
