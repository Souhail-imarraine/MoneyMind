<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // Si l'utilisateur est admin
            if (auth()->user()->role === 'admin') {
                // Si l'utilisateur essaie d'accéder au dashboard normal
                if ($request->routeIs('dashboard')) {
                    return redirect()->route('admin.dashboard');
                }
            }
            // Si l'utilisateur n'est pas admin
            else {
                // Si l'utilisateur essaie d'accéder au dashboard admin
                if ($request->routeIs('admin.*')) {
                    return redirect()->route('dashboard');
                }
            }
        }

        return $next($request);
    }
}
