<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Require2fa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        \Google2FA::logout();
//        return redirect()->route($request->route()->getName());
        return $next($request);
    }
}
