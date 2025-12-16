<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePinVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {   
        // Allow email verification routes to bypass PIN verification
        if ($request->is('user/email/*') || $request->is('user/reset-password/*')) {
            return $next($request);
        }
        
        if (!session()->get('pin_verified')) {
            return redirect()->route('pin.verify');
        }
        
        return $next($request);
    }
}
