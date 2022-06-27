<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (auth()->user()->roles == $roles) {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'Vous n\'avez pas la permission pour accéder à cette ressource');
    }
}
