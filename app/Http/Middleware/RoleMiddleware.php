<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // Cek apakah user telah login dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->hasRole($role)) {
            return $next($request);
        }

        // Arahkan atau kirim pesan error jika tidak memiliki akses
        return redirect('/')->with('error', 'You do not have access to this page');
    }
}
