<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PartnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if partner is authenticated
        if (!Auth::guard('partner')->check()) {
            return redirect()->route('partner.login');
        }

        $partner = Auth::guard('partner')->user();

        // Check if partner is active
        if ($partner->status !== 'active') {
            Auth::guard('partner')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('partner.login')
                ->withErrors(['email' => 'Your partner account is not active. Please contact support.']);
        }

        return $next($request);
    }
}
