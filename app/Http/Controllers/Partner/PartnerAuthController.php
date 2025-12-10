<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartnerAuthController extends Controller
{
    /**
     * Show the partner login form.
     */
    public function showLogin()
    {
        return view('partners.auth.login');
    }

    /**
     * Handle partner login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate using the partner guard
        if (Auth::guard('partner')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            $partner = Auth::guard('partner')->user();
            
            // Check if partner is active
            if ($partner->status !== 'active') {
                Auth::guard('partner')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return back()->withErrors([
                    'email' => 'Your partner account is not active. Please contact support.',
                ])->onlyInput('email');
            }
            
            return redirect()->intended(route('partner.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle partner logout request.
     */
    public function logout(Request $request)
    {
        Auth::guard('partner')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('partner.login');
    }
}
