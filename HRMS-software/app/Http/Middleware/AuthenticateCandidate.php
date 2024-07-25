<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthenticateCandidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the candidate is logged in
        if (!Session::has('candidate_id')) {
            // If not, redirect to the login page
            return redirect()->route('candidate.login');
        }

        // Allow the request to proceed
        return $next($request);
    }
}
