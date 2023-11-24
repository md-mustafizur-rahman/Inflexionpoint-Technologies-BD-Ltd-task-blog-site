<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has the admin role (assuming roles are stored in a roles column)
        if (Auth::user()->roles == 1) {
            return $next($request);
        } else {
            // Redirect to the previous page if the user doesn't have the admin role
            return redirect()->back();
        }
    }
}
