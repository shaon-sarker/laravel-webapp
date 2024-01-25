<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user has the role of "admin"
            if (auth()->user()->role === 'admin') {
                return $next($request);
            }
        }

        // If the user is not an admin, redirect or handle the restriction as needed
        return redirect('/')->with('error', 'Unauthorized access. Admins only.');
    }
}
