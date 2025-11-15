<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAccountant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return redirect()->back()->with('error', 'You must be logged in to access this page.');
        }


        if ($request->user()->role !== 'accountant') {
            return redirect()->back()->with('error', 'You are not authorized to access this page.');
        }


        return $next($request);
    }
}
