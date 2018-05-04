<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // dd(Auth::guard($guard)->check());
        if ($request->user()->type != 'admin')
        {
            return redirect('/home');
        }
        return $next($request);
    }
}
