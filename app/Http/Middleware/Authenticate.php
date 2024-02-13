<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        if (Auth::check() && !Auth::user()->isAdmin()) {
            Auth::logout(); 
            return redirect()->route('login')->with('error', 'You are not allowed to access this resource.');
        }

        return $next($request);
    }
}
