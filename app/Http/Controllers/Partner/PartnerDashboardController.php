<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Booking;
use App\Models\PartnerTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartnerDashboardController extends Controller
{
    /**
     * Display the partner dashboard.
     */
    public function index()
    {
        $partner = Auth::guard('partner')->user();
        $partner->load(['bookings', 'transactions']);

        // Get statistics
        $stats = [
            'total_bookings' => $partner->bookings()->count(),
            'total_revenue' => $partner->bookings()->sum('amount'),
            'total_commission' => $partner->transactions()
                ->where('transaction_type', 'commission')
                ->sum('amount'),
            'pending_balance' => $partner->current_balance,
            'available_credit' => $partner->available_credit,
        ];

        // Get recent bookings
        $recentBookings = $partner->bookings()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get recent transactions
        $recentTransactions = $partner->transactions()
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Get monthly statistics
        $monthlyStats = $this->getMonthlyStats($partner);

        return view('partners.dashboard', compact(
            'partner',
            'stats',
            'recentBookings',
            'recentTransactions',
            'monthlyStats'
        ));
    }

    /**
     * Display all partner bookings.
     */
    public function bookings()
    {
        $partner = Auth::guard('partner')->user();
        
        $bookings = $partner->bookings()
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('partners.bookings', compact('partner', 'bookings'));
    }

    /**
     * Display all partner transactions.
     */
    public function transactions()
    {
        $partner = Auth::guard('partner')->user();
        
        $transactions = $partner->transactions()
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('partners.transactions', compact('partner', 'transactions'));
    }

    /**
     * Display partner profile.
     */
    public function profile()
    {
        $partner = Auth::guard('partner')->user();
        
        return view('partners.profile', compact('partner'));
    }

    /**
     * Update partner profile.
     */
    public function updateProfile(Request $request)
    {
        $partner = Auth::guard('partner')->user();

        $validated = $request->validate([
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'website' => 'nullable|url|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Only update password if provided
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $partner->update($validated);

        return redirect()->route('partner.profile')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Get monthly statistics for the partner.
     */
    private function getMonthlyStats(Partner $partner)
    {
        $currentMonth = now()->startOfMonth();
        $lastMonth = now()->subMonth()->startOfMonth();

        return [
            'current_month' => [
                'bookings' => $partner->bookings()
                    ->whereMonth('created_at', $currentMonth->month)
                    ->whereYear('created_at', $currentMonth->year)
                    ->count(),
                'revenue' => $partner->bookings()
                    ->whereMonth('created_at', $currentMonth->month)
                    ->whereYear('created_at', $currentMonth->year)
                    ->sum('amount'),
                'commission' => $partner->transactions()
                    ->where('transaction_type', 'commission')
                    ->whereMonth('created_at', $currentMonth->month)
                    ->whereYear('created_at', $currentMonth->year)
                    ->sum('amount'),
            ],
            'last_month' => [
                'bookings' => $partner->bookings()
                    ->whereMonth('created_at', $lastMonth->month)
                    ->whereYear('created_at', $lastMonth->year)
                    ->count(),
                'revenue' => $partner->bookings()
                    ->whereMonth('created_at', $lastMonth->month)
                    ->whereYear('created_at', $lastMonth->year)
                    ->sum('amount'),
                'commission' => $partner->transactions()
                    ->where('transaction_type', 'commission')
                    ->whereMonth('created_at', $lastMonth->month)
                    ->whereYear('created_at', $lastMonth->year)
                    ->sum('amount'),
            ],
        ];
    }
}
