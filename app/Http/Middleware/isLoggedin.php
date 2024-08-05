<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLoggedin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && is_null(Auth::user())) {
            // Pengguna telah login tetapi tidak ada dalam sistem (null)
            Auth::logout(); // Logout pengguna yang tidak valid
            return redirect()
                ->route('login')
                ->withErrors(['message' => 'Your session has expired. Please login again.']);
        }

        return $next($request);
    }
}