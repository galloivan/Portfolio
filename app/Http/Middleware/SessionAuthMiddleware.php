<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('auth_user')) {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }

        return $next($request);
    }
}
