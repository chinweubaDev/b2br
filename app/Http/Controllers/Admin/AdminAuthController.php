<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLogin()
    {
        // Redirect if already logged in as admin
        if (Auth::check() && Auth::user()->hasAdminPrivileges()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt authentication
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();

            // Check if user has admin privileges
            if (!$user->hasAdminPrivileges()) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have admin access.',
                ])->onlyInput('email');
            }

            // Check if user is active
            if (!$user->is_active) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Your account has been deactivated. Please contact support.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();
            
            // Update last login timestamp
            $user->updateLastLogin();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('status', 'You have been logged out successfully.');
    }
}
