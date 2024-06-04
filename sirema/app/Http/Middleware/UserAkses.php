<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role The role required for the route
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is not authenticated
        if (!Auth::check()) {
            // Redirect to the login page with an error message
            return redirect('/login')->withErrors('Please log in to access this page.');
        }

        // Get the role of the authenticated user
        $userRole = Auth::user()->role;

        // Allow admin users to access all pages
        if ($userRole === 'admin' || $userRole === $role) {
            return $next($request);
        }

        // Redirect users with incorrect roles to their respective home page
        $url = "/" . $userRole . "/dashboard";
        return redirect($url)->withErrors('You do not have access to this page.');
    }
}
