<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user === null) {
            abort(401, 'Unauthorized'); // Added check for null user
        } elseif ($user->role == 'Admin') {
            return $next($request);
        } elseif ($user->role == 'Guru') {
            return $next($request);
        } else {
            abort(401, 'Unauthorized');
        }
    }
}
